<?php

namespace Database\Seeders;

use App\Models\Customer;
use App\Models\CustomerRole;
use App\Models\Role;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $user = new User;
        // $user->password = Hash::make('test');
        // $user->email = 'test@example.com';
        // $user->username = 'test';
        // $user->status = 'active';
        // $user->save();
        $adminRoot = User::create([
            'username' => 'admin',
            'email' => "admin@gmail.com",
            'password' => "admin",
            'status' => "active",
        ]);
        $role = Role::where('lever_key' ,'admin')->first();
        $customerRoot = Customer::whereNull('id_user')->where('status','active')->first();
        $customerRoot->update(['id_user'=>$adminRoot->id]);
        CustomerRole::updateOrCreate(
            [
                'id_customer' => $customerRoot->id,
            ],
            [
                'id_role' => $role->id,
                'id_customer' => $customerRoot->id,
            ]
        );

        $managerOneRoot =User::create([
            'username' => 'manager1',
            'email' => "manager1@gmail.com",
            'password' => "manager1",
            'status' => "active",
        ]);
        
        $roleOne = Role::where('lever_key' ,'manager1')->first();
        $managerOne = Customer::whereNull('id_user')->where('status','active')->first();
        $managerOne->update(['id_user'=>$managerOneRoot->id]);
        CustomerRole::updateOrCreate(
            [
                'id_customer' => $managerOne->id,
            ],
            [
                'id_role' => $roleOne->id,
                'id_customer' => $managerOne->id,
            ]
        );

        $managerTwoRoot = User::create([
            'username' => 'manager2',
            'email' => "manager2@gmail.com",
            'password' => "manager2",
            'status' => "active",
        ]);
        $roleTwo = Role::where('lever_key' ,'manager2')->first();
        $managerTwo = Customer::whereNull('id_user')->where('status','active')->first();
        $managerTwo->update(['id_user'=>$managerTwoRoot->id]);
        CustomerRole::updateOrCreate(
            [
                'id_customer' => $managerTwo->id,
            ],
            [
                'id_role' => $roleTwo->id,
                'id_customer' => $managerTwo->id,
            ]
        );

        

        $managerStaffRoot = User::create([
            'username' => 'staff',
            'email' => "staff@gmail.com",
            'password' => "staff",
            'status' => "active",
        ]);
        $roleStaff = Role::where('lever_key' ,'staff')->first();
        $managerStaff = Customer::whereNull('id_user')->where('status','active')->first();
        $managerStaff->update(['id_user'=>$managerStaffRoot->id]);
        CustomerRole::updateOrCreate(
            [
                'id_customer' => $managerStaff->id,
            ],
            [
                'id_role' => $roleStaff->id,
                'id_customer' => $managerStaff->id,
            ]
        );

    }
}
