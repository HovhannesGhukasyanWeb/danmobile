<?php

namespace Database\Seeders;

use App\Models\Admin;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run() : void
    {
        $adminData = [
            "email" => 'dan@gmail.com',
            "password" => bcrypt('password'),
        ];

        Admin::create($adminData);
    }
}
