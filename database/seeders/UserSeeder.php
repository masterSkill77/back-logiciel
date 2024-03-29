<?php

namespace Database\Seeders;

use App\Enum\Role;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    { $array= [
        'name'=>'contact',
        'email'=>'contact@koders.com',
         'password'=>Hash::make('123456789'),
         'role' => Role::SUPER_ADMIN,
         'agency_id' => 1,
         'email_verified_at' => now()
        ];
        User::create($array);
    }
}
