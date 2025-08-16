<?php

namespace Database\Seeders;

use App\Models\Customer;
use App\Models\CustomerRole;
use App\Models\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CustomerRoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role = Role::where('lever_key' ,'customer')->first();
        $customers = Customer::all();
        foreach ($customers as  $c) {
            CustomerRole::create(
                [
                    'id_role' => $role->id,
                    'id_customer' => $c->id,
                ]
            );
        }
        //
    }
}
