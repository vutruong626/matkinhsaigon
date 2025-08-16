<?php

namespace App\Http\Controllers\Admin\Customer;

use App\Http\Controllers\Controller;
use App\Http\Requests\User\AddUserRequest;
use App\Http\Requests\User\UpdateUserRequest;
use App\Models\Customer;
use App\Models\CustomerRole;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use App\Services\Utilities\UploadImages;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function getListCustomerUser()
    {
        $dbCustomerUser = new Customer;
        $userRoleStaff = ($staffRoles = Role::where('lever_key','staff')->first(['lever'])) ? $staffRoles->lever : 1000 ;
        $userRoles = ($userRole = CustomerRole::where('id_customer',auth()->user()->customer->id)->first() ) ?  $userRole->customerRole->lever : 1000;
        
        $roles = Role::where('lever','>=',$userRoles)->where('lever','<',60)->get();
        
        $listCustomerUser = $dbCustomerUser->whereHas(
            'customerRoles', function($q) use ($userRoleStaff,$userRoles) {
                $q->where('lever', '>=', $userRoles);
                $q->where('lever', '<=', $userRoleStaff);
            }
        )->ofType('active')->with('customerRoles')->with('userLogin')->get()->toArray();

        $listUserDeactive = $dbCustomerUser->whereHas(
            'customerRoles', function($q) use ($userRoleStaff,$userRoles) {
                $q->where('lever', '>=', $userRoles);
                $q->where('lever', '<=', $userRoleStaff);
            }
        )->ofType('deactive')->with('customerRoles')->with('userLogin')->get()->toArray();
 
        $listCustomerUser = array_merge($listCustomerUser, $listUserDeactive);
        $customerUserStatistics = [
            'totalRoles' => $roles->count(),
            'totalUserActive' => count($listCustomerUser),
            'totalUserDeactive' => count($listUserDeactive),
        ];

        return view('admin.dashboard.user.list-user')->with('listCustomerUser',$listCustomerUser)->with('customerUserStatistics',$customerUserStatistics)->with('roles',$roles);
    }

    public function postAddCustomerUser(AddUserRequest $request)
    {
        $roleLeverKey = $request->role;
        $dataCustomerUser = $request->only("first_name","last_name","email_customer","phone","avatar","status");

        $dataCustomerUser['created_user_id']  = auth()->id();

        
        $roleRow = Role::where('lever_key',$roleLeverKey)->first();
        $userRoles = ($userRole = CustomerRole::where('id_customer',auth()->user()->customer->id)->first() ) ?  $userRole->customerRole->lever : 1000;

        if($userRoles >= $roleRow->lever && $userRoles !== 1) {
            return redirect()->back()->withErrors("Bạn không đủ quyền thay đổi người này!");
        }

       
        if(isset($request->customer_avatar) && !empty($request->customer_avatar)) {
            
            $uploadImage = AVATAR_DEFAULT_CUSTOMER;
            foreach ($request->customer_avatar as $avatar) {
                $uploadImage = UploadImages::storeImageAs($avatar, Customer::AVATAR);
            }
            $dataCustomerUser['avatar'] = Customer::AVATAR.$uploadImage;
        }

        $customerUserCreated = Customer::updateOrCreate(
            ['email_customer' => $dataCustomerUser['email_customer']],
            $dataCustomerUser
        );
        
        
        if($customerUserCreated && $roleRow) {

            $userLogin = User::updateOrCreate(
                ['username' => $request->username],
                [
                'password' => $request->password,
                'email' => $request->email_customer, 
                'status' => $request->status, 
                ]
            );
            $customerUserCreated->update(['id_user' => $userLogin->id]);

            CustomerRole::updateOrCreate(
                ['id_customer' => $customerUserCreated->id],
                [
                'id_role' => $roleRow->id,
                'id_customer' => $customerUserCreated->id,  
                ]
            );

            return redirect()->back()->with('success', 'Tạo nhân viên '.$customerUserCreated->email_customer.' thành công');
        } else {
            
            return redirect()->back()->withErrors("Tạo nhân viên Thất Bại Vui lòng thử lại sau!");
        }
    }

    public function postUpdateCustomerUser(UpdateUserRequest $request)
    {
        // dd($request->all());
        $roleLeverKey = $request->role;
        $dataCustomerUser = $request->only("first_name","last_name","email_customer","phone","avatar","status");

        if(isset($request->old_password) && isset($request->password)) {
            $thisUser = User::where('username',$request->username)->first();
            if(Hash::check($request->old_password, $thisUser->password)) {
                $thisUser->update([
                    'password' => Hash::make($request->password)
                ]);
            } else {
                return redirect()->back()->withErrors("Mật khẩu cũ không chính xác !");  
            }

        }
        $dataCustomerUser['created_user_id']  = auth()->id();

        
        $roleRow = Role::where('lever_key',$roleLeverKey)->first();
        $userRoles = ($userRole = CustomerRole::where('id_customer',auth()->user()->customer->id)->first() ) ?  $userRole->customerRole->lever : 1000;

        if($userRoles >= $roleRow->lever && $userRoles !== 1) {
            return redirect()->back()->withErrors("Bạn không đủ quyền thay đổi người này!");
        }
       
        if(isset($request->customer_avatar) && !empty($request->customer_avatar)) {
            
            $uploadImage = AVATAR_DEFAULT_CUSTOMER;
            foreach ($request->customer_avatar as $avatar) {
                $uploadImage = UploadImages::storeImageAs($avatar, Customer::AVATAR);
            }
            $dataCustomerUser['avatar'] = Customer::AVATAR.$uploadImage;
        }

        $customerUserCreated = Customer::updateOrCreate(
            ['email_customer' => $dataCustomerUser['email_customer']],
            $dataCustomerUser
        );
        
        
        if($customerUserCreated && $roleRow) {

            $userLogin = User::updateOrCreate(
                ['username' => $request->username],
                [
                'password' => Hash::make($request->password),
                'email' => $request->email_customer, 
                'status' => $request->status, 
                ]
            );
            $customerUserCreated->update(['id_user' => $userLogin->id]);

            CustomerRole::updateOrCreate(
                ['id_customer' => $customerUserCreated->id],
                [
                'id_role' => $roleRow->id,
                'id_customer' => $customerUserCreated->id,  
                ]
            );

            return redirect()->back()->with('success', 'Cập nhật '.$customerUserCreated->email_customer.' thành công');
        } else {
            
            return redirect()->back()->withErrors("Cập nhật nhân viên Thất Bại Vui lòng thử lại sau!");
        }
    }
    
    public function deleteCustomerUser($id)
    {
        $customerUserDelete = Customer::find($id);
        $customerUserDelete->delete();
        return redirect()->back()->with('success', 'Xóa '.$customerUserDelete->email_customer.' thành công');
    }

    public function getChangePassword($id) {

        return view('admin.dashboard.user.change-pass');
    }
    public function postChangePassword(Request $request, $id) {
        $request->validate( [
            'pass_old'      => 'required',
            'pass_new'      => 'required',
            'pass_new_check'      => 'required',
        ]);
        $thisUser = User::find($id);
        if(Hash::check($request->pass_old, $thisUser->password)) {
            if($request->pass_new === $request->pass_new_check) {
                $thisUser->password = $request->pass_new;
                if($thisUser->update()) {
                    return redirect()->route('user.getListCustomerUser')
                                ->withSuccess(trans('auth.failed'));
                }else {
                    return redirect()->back()->withErrors("Cập nhật nhân viên Thất Bại Vui lòng thử lại sau!");
                }
            }else {
                return redirect()->back()->withErrors("Mật khẩu cũ không chính xác !");  
            }
        } else {
            return redirect()->back()->withErrors("Mật khẩu cũ không chính xác !");  
        }
    }
}
