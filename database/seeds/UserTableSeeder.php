<?php

use App\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Javad Ezaz',
            'role' => 10,
            'email' => 'a@b.com',
            'phone' => '09361667780',
            'password' => bcrypt('123456'),
        ]);
    }
}
