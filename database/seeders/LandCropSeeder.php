<?php

namespace Database\Seeders;

use App\Models\LandCrop;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class LandCropSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        LandCrop::truncate();
        $landCrops=[
            [
                'id'=>1,
                'crop_name'=>'Coffee',
            ],
            [
                'id'=>2,
                'crop_name'=>'Rubber',
            ],
            [
                'id'=>3,
                'crop_name'=>'Arecanut',
            ],
            [
                'id'=>4,
                'crop_name'=>'Broom',
            ],
        ];
        foreach ($landCrops as $crop){
            LandCrop::query()->create($crop);
        }
    }
}
