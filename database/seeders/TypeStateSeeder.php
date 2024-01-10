<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\TypeEstate;

// type de bien
class TypeStateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('type_estate')->truncate();

        TypeEstate::create(['designation' => 'Maison']);
        TypeEstate::create(['designation' => 'Appartement']);
        TypeEstate::create(['designation' => 'Terrain']);
        TypeEstate::create(['designation' => 'Autre']);
        
    }
}
