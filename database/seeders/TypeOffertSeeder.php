<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\TypeOffert;

class TypeOffertSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('type_offert')->insert([
            ['designation' => 'vente'],
            ['designation' => 'location'],
            ['designation' => 'classique'],
            ['designation' => 'saisoniere']
        ]);
    }
}
