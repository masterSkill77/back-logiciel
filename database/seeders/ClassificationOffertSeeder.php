<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\ClassificationOffert;

class ClassificationOffertSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('classification_offert')->truncate();
        $datas= [
            ['designation' => 'vente','type_offert_id' => 3],
            ['designation' => 'location saisoniere','type_offert_id' => 1],
            ['designation' => 'location saisoniere','type_offert_id' => 2],
            ['designation' => 'location saisoniere','type_offert_id' => 3],
            ['designation' => 'location saisoniere','type_offert_id' => 4],
            ['designation' => 'Offre Programme neuf','type_offert_id' => 4],
            ['designation' => 'location','type_offert_id' => 1],
            ['designation' => 'location','type_offert_id' => 2],
            ['designation' => 'location','type_offert_id' => 3],
            ['designation' => 'location','type_offert_id' => 4]
        ];
        foreach($datas as $data) {
            ClassificationOffert::create($data);
        }
    }
}

