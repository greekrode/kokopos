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
        DB::table('users')->insert([
            'name' => 'cashier',
            'email' => 'cashier@kokopos.com',
            'password' => bcrypt('cashier1234'),
            'role' => 'user'
        ]);
    }
}
