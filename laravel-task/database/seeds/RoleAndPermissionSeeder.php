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

        $permisions = [
            "create",
            "edit",
            "view"
        ];

        foreach ($roles as $key => $role) {
            Role::create(["name" => $role]);
        }

        foreach ($permisions as $key => $permision) {
            Permission::create(["name" => $permision]);
        }
    }
}
