<?php

use App\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::create([
            'first_name' => 'Al-Amin',
            'last_name' => 'Msangi',
            'email' => 'alaminhamadi@gmail.com',
            'phone_number' => '0718266302',
            'password' => Hash::make('admin'),
            'user_type' => 1,
        ]);

        $user->assignRole(Role::pluck('name'));
        $user->givePermissionTo(Permission::pluck('name'));
    }
}
