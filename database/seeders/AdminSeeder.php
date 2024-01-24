<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Admin;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Admin::create([
            'fullname' => 'Admin Dev',
            'phone' => '0342909557',
            'email' => 'admindev@gmail.com',
            'address' => null,
            'password' => bcrypt('123456'),
            'role' => 'dev'
        ]);
    }
}
