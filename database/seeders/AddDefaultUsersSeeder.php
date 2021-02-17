<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AddDefaultUsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $users = [
        ['name' => 'jas1','email'=>'jas1@mailinator.com','role'=>'registered','password'=>bcrypt(12345678),'created_at'=>date('Y-m-d H:i:s'),'updated_at'=>date('Y-m-d H:i:s')],
        ['name' => 'jas2','email'=>'jas2@mailinator.com','role'=>'employee','password'=>bcrypt(12345678),'created_at'=>date('Y-m-d H:i:s'),'updated_at'=>date('Y-m-d H:i:s')],
        ['name' => 'jas3','email'=>'jas3@mailinator.com','role'=>'manager','password'=>bcrypt(12345678),'created_at'=>date('Y-m-d H:i:s'),'updated_at'=>date('Y-m-d H:i:s')],
      ];
      DB::table('users')->insert($users);
    }
}
