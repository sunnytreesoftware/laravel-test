<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleAndPermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $roles = [
            "manager",
            "sales",
            "mechanic",
            "accountant",
            "receptionaist",
            "president",
            "customer"
        ];

        $permissions = [
            "create",
            "edit",
            "view"
        ];

        foreach ($roles as $key => $role) {
            Role::create(["name" => $role]);
        }

        foreach ($permissions as $key => $permission) {
            Permission::create(["name" => $permission]);
        }

        $manager_role = Role::where('name', 'manager')->first();
        $manager_role->givePermissionTo($permissions);

        $employee_roles = Role::where('name', '!=', 'customer')->get();
        foreach ($employee_roles as $key => $role) {
            $role->givePermissionTo(['edit']);
        }

        $customer_role = Role::where('name', 'customer')->first();
        $customer_role->givePermissionTo('view');
        
    }
}
