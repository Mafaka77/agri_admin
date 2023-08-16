<?php

namespace Database\Seeders;

use App\Models\Livestock;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class LivestockSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Livestock::truncate();
        $livestocks=[
            [
                'id'=>'1',
                'livestock_name'=>'Buffalo'
            ],
            [
                'id'=>'2',
                'livestock_name'=>'Cattle'
            ],
            [
                'id'=>'3',
                'livestock_name'=>'Donkey'
            ],
            [
                'id'=>'4',
                'livestock_name'=>'Goat'
            ],
            [
                'id'=>'5',
                'livestock_name'=>'Horse'
            ],
            [
                'id'=>'6',
                'livestock_name'=>'Pig'
            ],
            [
                'id'=>'7',
                'livestock_name'=>'Poultry'
            ],
            [
                'id'=>'8',
                'livestock_name'=>'Sheep'
            ],
        ];
        foreach ($livestocks as $livestock){
             Livestock::query()->create($livestock);
        }
    }
}
