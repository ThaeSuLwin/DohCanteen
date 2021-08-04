<?php

use Illuminate\Database\Seeder;
use App\User;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name'           => 'DohCanteen Admin',
            'email'          => 'dohcanteen@admin.com',
            'password'       => bcrypt('dohcanteen'),
            'role'           => 'admin',
           
        ]);
    }
}
