<?php

namespace Database\Seeders;

use App\Enum\Role;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    { $array= [
        'name'=>'contact', 
        'email'=>'contact@koders.com',
         'password'=>'123456789', 
         'role' => 777,
         'agency_id' => 1
        ];
        User::create($array);
    }
}