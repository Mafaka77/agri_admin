<?php

namespace Database\Seeders;

use App\Models\GreenHousePlant;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class GreenHousePlantSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        GreenHousePlant::truncate();
        $plants=[
            [
                'name'=>'Tomato'
            ],
            [
                'name'=>'Strawberry'
            ],
            [
                'name'=>'Radish'
            ],
            [
                'name'=>'Potato'
            ],
            [
                'name'=>'Cucumber'
            ],
            [
                'name'=>'Capsicum'
            ],
            [
                'name'=>'Cabbage'
            ],
            [
                'name'=>'Anthurium'
            ],
        ];
        foreach ($plants as $plant) {
            GreenHousePlant::query()->create($plant);
        }
    }
}
