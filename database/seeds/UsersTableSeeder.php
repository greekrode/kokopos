<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = [
            [
                'name' => 'cashier',
                'email' => 'cashier@cashier.com',
                'password' => bcrypt('cashier1234'),
                'role' => 'user'
            ],
            [
                'name' => 'admin',
                'email' => 'admin@admin.com',
                'password' => bcrypt('admin1234'),
                'role' => 'admin'
            ]
        ];


        DB::table('users')->insert($users);
    }
}
