<?php

namespace Database\Seeders;

use App\Models\Agency;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AgencySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $array = [
            'nameAgency' => 'Agence',
            'nameCompany' => 'Company',
            'addressCompany' => 'Street of Company 32 South',
            'pige_online_key' => 'AizaXyA110HkmCvvbLxVyt55gLkdKcDt0H7',
            'phoneAgency' => '+3324561896'
        ];
        Agency::create($array);
    }
}
