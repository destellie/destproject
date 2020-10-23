<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\User;
use App\Role;
class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     * creating role of users
     * @return void
     */
    public function run()
    {
      
        DB::table('role_user');

        $admin = User::create([
            'name'=>'admin',
            'email'=>'admin@admin.com',
            'password'=>Hash::make('password')
            ]);
          $customer =  User::create([
                'name'=>'customer',
                'email'=>'customer@admin.com',
                'password'=>Hash::make('password')
                ]);

                $adminRole= Role::where('name','admin')->first();
                $customerRole= Role::where('name','customer')->first();

                $admin->roles()->attach($adminRole);
                $customer->roles()->attach($customerRole);
    }
}
