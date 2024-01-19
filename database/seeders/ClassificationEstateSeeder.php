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
        DB::table('classification_estate')->truncate();
        $classifications = [
            ['designation' => 'Maison', 'type_estate_id' => 1],
            ['designation' => 'Villa', 'type_estate_id' => 1],
            ['designation' => 'Propriété', 'type_estate_id' => 1],
            ['designation' => 'Ferme', 'type_estate_id' => 1],
            ['designation' => 'Bastide', 'type_estate_id' => 1],
            ['designation' => 'Mas', 'type_estate_id' => 1],
            ['designation' => 'Rez de villa', 'type_estate_id' => 1],
            ['designation' => 'Appartement', 'type_estate_id' => 2],
            ['designation' => 'Rez de jardin', 'type_estate_id' => 2],
            ['designation' => 'Duplex', 'type_estate_id' => 2],
            ['designation' => 'Triplex', 'type_estate_id' => 2],
            ['designation' => 'Loft', 'type_estate_id' => 2],
            ['designation' => 'Studio', 'type_estate_id' => 2],
            ['designation' => 'Terrain', 'type_estate_id' => 3],
            ['designation' => 'Terrain agricole', 'type_estate_id' => 3],
            ['designation' => 'Terrain de loisir', 'type_estate_id' => 3],
            ['designation' => 'Terrain à bâtir', 'type_estate_id' => 3],
            ['designation' => 'Autre', 'type_estate_id' => 4],
            ['designation' => 'Cabanon', 'type_estate_id' => 4],
            ['designation' => 'Chalet', 'type_estate_id' => 4],
            ['designation' => 'Cave', 'type_estate_id' => 4],
            ['designation' => 'Garage', 'type_estate_id' => 4],
            ['designation' => 'Parking', 'type_estate_id' => 4],
            ['designation' => 'Immeuble', 'type_estate_id' => 4],
            ['designation' => 'Viager', 'type_estate_id' => 4]
        ];

        foreach ($classifications as $classification) {
            ClasssificationEstate::create($classification);
        }
    }
}
