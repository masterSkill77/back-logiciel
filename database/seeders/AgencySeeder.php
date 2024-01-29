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
            'phoneAgency' => '+3324561896'
        ];
        Agency::create($array);
    }
}
