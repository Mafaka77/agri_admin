<?php

namespace Database\Seeders;

use App\Models\LandHolding;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class LandHoldingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        LandHolding::truncate();
        $landholdings=[
            [
                'id'=>1,
                'land_holding_name'=>'WRC'
            ],
            [
                'id'=>2,
                'land_holding_name'=>'Plantation'
            ],
            [
                'id'=>3,
                'land_holding_name'=>'Jhum'
            ],

        ];
        foreach ($landholdings as $landholding){
            LandHolding::query()->create($landholding);
        }
    }
}
