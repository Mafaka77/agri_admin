<?php

namespace Database\Seeders;

use App\Models\TypeOfFarm;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TypeOfFarmSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data=TypeOfFarm::truncate();
        $farmsType=[
            [
                'name'=>'Milk'
            ],
            [
                'name'=>'Breeding'
            ],
            [
                'name'=>'Meat Purpose'
            ]
        ];
        foreach ($farmsType as $farm){
            TypeOfFarm::query()->create($farm);
        }
    }
}
