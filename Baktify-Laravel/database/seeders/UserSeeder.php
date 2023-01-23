<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Member',
            'email' => 'member@gmail.com',
            'password' => bcrypt('password'),
            'address' => 'Jalan Dimana-mana Hatiku senang',
            'phone' => '089898989898',
            'role' => 'Member'
        ]);

        User::create([
            'name' => 'Admin',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('password'),
            'address' => 'Jalan Rumah Admin Tinggal',
            'phone' => '12345678901',
            'role' => 'Admin'
        ]);
    }
}
