<?php

namespace App\Http\Controllers\Admin\Customer;

use App\Http\Controllers\Controller;
use App\Http\Requests\Customer\AddCustomerRequest;
use App\Models\Customer;
use App\Models\CustomerRole;
use App\Models\Role;
use Illuminate\Http\Request;
use App\Services\Utilities\UploadImages;

class CustomerController extends Controller
{

    public function getListCustomer()
    {
        $dbCustomer = new Customer;
        $userRoleCustomer = ($customerRoles = Role::where('lever_key','customer_old')->first(['lever'])) ? $customerRoles->lever : 1000 ;

        $roles = Role::where('lever','>=',60)->get();

        $listCustomer = $dbCustomer->whereHas(
            'customerRoles', function($q) use ($userRoleCustomer) {
                $q->where('lever', '>=', $userRoleCustomer);
            }
        )->ofType('active')->with('customerRoles')->get()->toArray();
        
        $listCustomerDeactive = $dbCustomer->whereHas(
            'customerRoles', function($q) use ($userRoleCustomer) {
                $q->where('lever', '>=', $userRoleCustomer);
            }
        )->ofType('deactive')->with('customerRoles')->get()->toArray();
        
        $customerStatistics = [
            'totalRoles' => $roles->count(),
            'totalCustomerActive' => count($listCustomer),
            'totalCustomerDeactive' => count($listCustomerDeactive),
        ];

        return view('admin.dashboard.customer.list-customer')->with('listCustomer',$listCustomer)->with('customerStatistics',$customerStatistics)->with('roles',$roles);
    }

    public function postAddCustomer(AddCustomerRequest $request)
    {
        $roleLeverKey = $request->role;
        $dataCustomer = $request->only("first_name","last_name","email_customer","phone","avatar","status","birthday");
        $dataCustomer['created_user_id']  = auth()->id();

               
        if(isset($request->customer_avatar) && !empty($request->customer_avatar)) {
            $uploadImage = AVATAR_DEFAULT_CUSTOMER;
            foreach ($request->customer_avatar as $avatar) {
                $uploadImage = UploadImages::storeImageAs($avatar, Customer::AVATAR);
            }
            $dataCustomer['avatar'] = Customer::AVATAR.$uploadImage;
        }

        $customerCreated = Customer::updateOrCreate(
            ['email_customer' => $dataCustomer['email_customer']],
            $dataCustomer
        );

        $roleRow = Role::where('lever_key',$roleLeverKey)->first();

        if($customerCreated && $roleRow) {

            CustomerRole::updateOrCreate(
                ['id_customer' => $customerCreated->id],
                [
                'id_role' => $roleRow->id,
                'id_customer' => $customerCreated->id,  
                ]
            );
            return redirect()->back()->with('success', 'Cập nhật '.$customerCreated->email_customer.' thành công');
        } else {
            
            return redirect()->back()->withErrors("Thất Bại Vui lòng thử lại sau!");
        }
    }
    
    public function deleteCustomer($id)
    {
        $customerDelete = Customer::find($id);
        $customerDelete->delete();
        return redirect()->back()->with('success', 'Xóa '.$customerDelete->email_customer.' thành công');
    }

}
