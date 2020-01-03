<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;

class AdminSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'Harsha De Pinto',
            'email' => 'designerdepinto@gmail.com',
            'password' => Hash::make('123'),
            'role_id' => 1,
            'is_active' => 1,
            'status' => 1,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')

        ]);

        DB::table('users')->insert([
            'name' => 'Driver De Pinto',
            'email' => 'driver@gmail.com',
            'password' => Hash::make('123'),
            'role_id' => 3,
            'is_active' => 1,
            'status' => 1,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')

        ]);

        DB::table('users')->insert([
            'name' => 'Staff De Pinto',
            'email' => 'staff@gmail.com',
            'password' => Hash::make('123'),
            'role_id' => 2,
            'is_active' => 1,
            'status' => 1,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')

        ]);

        DB::table('users')->insert([
            'name' => 'Cliant De Pinto',
            'email' => 'client@gmail.com',
            'password' => Hash::make('123'),
            'role_id' => 4,
            'is_active' => 1,
            'status' => 1,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')

        ]);

        DB::table('roles')->insert([
            'name' => 'ADMIN',
            'id' => 1

        ]);

        DB::table('roles')->insert([
            'name' => 'STAFF',
            'id' => 2

        ]);

        DB::table('roles')->insert([
            'name' => 'DRIVER',
            'id' => 3

        ]);

        DB::table('roles')->insert([
            'name' => 'CLIENT',
            'id' => 4

        ]);
    }
}
