<?php

namespace Database\Seeders;

use App\Models\KharifCrops;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class KharifCropsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        KharifCrops::truncate();
        $kharifs=[
            [
                'id'=>1,
                'kharif_crops_name'=>'Apples',
            ],
            [
                'id'=>2,
                'kharif_crops_name'=>'Banana',
            ],
            [
                'id'=>3,
                'kharif_crops_name'=>'Bitter Ground',
            ],
            [
                'id'=>4,
                'kharif_crops_name'=>'Brinjal',
            ],
            [
                'id'=>5,
                'kharif_crops_name'=>'Chilli',
            ],
            [
                'id'=>6,
                'kharif_crops_name'=>'Coconut',
            ],
            [
                'id'=>7,
                'kharif_crops_name'=>'Cotton',
            ],
            [
                'id'=>8,
                'kharif_crops_name'=>'Dates',
            ],
            [
                'id'=>9,
                'kharif_crops_name'=>'Green beans',
            ],
            [
                'id'=>10,
                'kharif_crops_name'=>'Groundnut',
            ],
            [
                'id'=>11,
                'kharif_crops_name'=>'Guava',
            ],
            [
                'id'=>12,
                'kharif_crops_name'=>'Ladies Fingers',
            ],
            [
                'id'=>13,
                'kharif_crops_name'=>'Litchi',
            ],
            [
                'id'=>14,
                'kharif_crops_name'=>'Maize',
            ],
            [
                'id'=>15,
                'kharif_crops_name'=>'Mango',
            ],
            [
                'id'=>16,
                'kharif_crops_name'=>'Orange',
            ],
            [
                'id'=>17,
                'kharif_crops_name'=>'Papaya',
            ],
            [
                'id'=>18,
                'kharif_crops_name'=>'Pears',
            ],
            [
                'id'=>19,
                'kharif_crops_name'=>'Plums',
            ],
            [
                'id'=>20,
                'kharif_crops_name'=>'Pomegranate',
            ],
            [
                'id'=>21,
                'kharif_crops_name'=>'Rice',
            ],
            [
                'id'=>22,
                'kharif_crops_name'=>'Sesame',
            ],
            [
                'id'=>23,
                'kharif_crops_name'=>'Soybean',
            ],
            [
                'id'=>24,
                'kharif_crops_name'=>'Sugarcane',
            ],
            [
                'id'=>25,
                'kharif_crops_name'=>'Tapioca',
            ],
            [
                'id'=>26,
                'kharif_crops_name'=>'Tobacco',
            ],
            [
                'id'=>27,
                'kharif_crops_name'=>'Tomato',
            ],
            [
                'id'=>28,
                'kharif_crops_name'=>'Turmeric',
            ],
            [
                'id'=>29,
                'kharif_crops_name'=>'Walnut',
            ],
            [
                'id'=>30,
                'kharif_crops_name'=>'Watermelon',
            ]
        ];
        foreach ($kharifs as $kharif){
            KharifCrops::query()->create($kharif);
        }
    }
}
