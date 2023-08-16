<?php

namespace Database\Seeders;

use App\Models\Fish;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class FishSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Fish::truncate();
        $fish=[
            [
                'id'=>1,
                'fish_name'=>'Basa',
            ],
            [
                'id'=>2,
                'fish_name'=>'Catla (bau)',
            ],
            [
                'id'=>3,
                'fish_name'=>'Common carp (Sangha sen)',
            ],
            [
                'id'=>4,
                'fish_name'=>'Grasscarp',
            ],
            [
                'id'=>5,
                'fish_name'=>'Hilsa',
            ],
            [
                'id'=>6,
                'fish_name'=>'Mrigal',
            ],
            [
                'id'=>7,
                'fish_name'=>'Pomfret',
            ],
            [
                'id'=>8,
                'fish_name'=>'Rohu (rau)',
            ],
            [
                'id'=>9,
                'fish_name'=>'Silvercarp',
            ],
        ];
        foreach ($fish as $f){
            Fish::query()->create($f);
        }
    }
}
