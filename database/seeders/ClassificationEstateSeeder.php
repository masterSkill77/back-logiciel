<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\ClasssificationEstate;

// classification de bien
class ClassificationEstateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //classification de bien
        DB::table('classsification_estate')->truncate();
        $classifications = [
            ['designation' => 'Maison'],
            ['designation' => 'Villa'],
            ['designation' => 'Propriété'],
            ['designation' => 'Ferme'],
            ['designation' => 'Bastide'],
            ['designation' => 'Mas'],
            ['designation' => 'Rez de villa'],
            ['designation' => 'Appartement'],
            ['designation' => 'Rez de jardin'],
            ['designation' => 'Duplex'],
            ['designation' => 'Triplex'],
            ['designation' => 'Loft'],
            ['designation' => 'Studio'],
            ['designation' => 'Terrain'],
            ['designation' => 'Terrain agricole'],
            ['designation' => 'Terrain de loisir'],
            ['designation' => 'Terrain à bâtir'],
            ['designation' => 'Autre'],
            ['designation' => 'Cabanon'],
            ['designation' => 'Chalet'],
            ['designation' => 'Cave'],
            ['designation' => 'Garage'],
            ['designation' => 'Parking'],
            ['designation' => 'Immeuble'],
            ['designation' => 'Viager'],
            ['designation' => 'Viager'],
            ['designation' => 'Viager'],
            ['designation' => 'Viager'],
        ];

        foreach ($classifications as $classification) {
            ClasssificationEstate::create($classification);
        }
    }
}
