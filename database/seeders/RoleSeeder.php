<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Role::create([
            'name' => 'Admin',
            'lever_key' => "admin",
            'lever' => 1,
        ]);
        
        Role::create([
            'name' => 'Quản lý cấp 1',
            'lever_key' => "manager1",
            'lever' => 20,
        ]);

        
        Role::create([
            'name' => 'Quản lý cấp 2',
            'lever_key' => "manager2",
            'lever' => 30,
        ]);

        Role::create([
            'name' => 'Nhân viên',
            'lever_key' => "staff",
            'lever' => 50,
        ]);
        
        Role::create([
            'name' => 'Khách hàng lâu năm',
            'lever_key' => "customer_old",
            'lever' => 60,
        ]);

        Role::create([
            'name' => 'Khách hàng',
            'lever_key' => "customer",
            'lever' => 70,
        ]);
    }
}
