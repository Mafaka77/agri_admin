<?php

namespace Database\Seeders;

use App\Models\Plantation;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PlantationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Plantation::truncate();
        $plantations=[
            [
                'id'=>1,
                'plantation_name'=>'Bamboo'
            ],
            [
                'id'=>2,
                'plantation_name'=>'Betelvine'
            ],
            [
                'id'=>3,
                'plantation_name'=>'Cashew Nuts'
            ],
            [
                'id'=>4,
                'plantation_name'=>'Coffee Plant'
            ],
            [
                'id'=>5,
                'plantation_name'=>'Tea'
            ]
        ];
        foreach ($plantations as $plantation){
            Plantation::query()->create($plantation);
        }
    }
}
