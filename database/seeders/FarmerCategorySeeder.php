<?php

namespace Database\Seeders;

use App\Models\FarmerCategory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class FarmerCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        FarmerCategory::truncate();
        $category=[
            [
                'id'=>1,
                'f_category_name'=>'Landless'
            ],
            [
                'id'=>2,
                'f_category_name'=>'Marginal (<1 Ha)'
            ],
            [
                'id'=>3,
                'f_category_name'=>'Small (1-2 Ha)'
            ],
            [
                'id'=>4,
                'f_category_name'=>'Semi-Medium (2-4 Ha)'
            ],
            [
                'id'=>5,
                'f_category_name'=>'Medium (4-10 Ha)'
            ],
            [
                'id'=>6,
                'f_category_name'=>'Large (10+ Ha)'
            ],
        ];
        foreach ($category as $cat){
            FarmerCategory::query()->create($cat);
        }
    }
}
