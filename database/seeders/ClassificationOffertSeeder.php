<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ClassificationOffertSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        DB::table('classification_offert')->insert([
            ['designation' => 'classique'],
            ['designation' => 'location saisoniere'],
            ['designation' => 'programme neuf'],
            ['designation' => 'location'],
        ]);
    }
}
