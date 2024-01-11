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
        DB::table('type_offert')->truncate();
        $datas = [
            ['designation' => 'vente'],
            ['designation' => 'location'],
            ['designation' => 'classique'],
            ['designation' => 'programme neuf']
        ];
        foreach($datas as $data) {
            TypeOffert::create($data);
        }
    }
}
