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
                'f_category_name'=>'Small'
            ],
            [
                'id'=>2,
                'f_category_name'=>'Marginal'
            ],
            [
                'id'=>3,
                'f_category_name'=>'Large'
            ],
        ];
        foreach ($category as $cat){
            FarmerCategory::query()->create($cat);
        }
    }
}
