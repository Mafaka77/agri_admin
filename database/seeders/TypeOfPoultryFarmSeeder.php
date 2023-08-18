<?php

namespace Database\Seeders;

use App\Models\TypeOfPoultryFarm;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TypeOfPoultryFarmSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        TypeOfPoultryFarm::truncate();
        $farms=[
            [
                'name'=>'Egg'
            ],
            [
                'name'=>'Meat'
            ]
        ];
        foreach ($farms as $farm){
            TypeOfPoultryFarm::query()->create($farm);
        }
    }
}
