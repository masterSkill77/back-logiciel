<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {   
        // type de bien 
        $this->call(TypeStateSeeder::class);
        // type d'offert 
        $this->call(TypeOffertSeeder::class);
        $this->call(ClassificationOffertSeeder::class);
        // classification du bien 
        $this->call(ClassificationEstateSeeder::class);
    }
}
