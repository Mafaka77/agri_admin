<?php

namespace Database\Seeders;

use App\Models\Orchards;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class OrchardsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Orchards::truncate();
        $orchards=[
            [
                'id'=>1,
                'orchards_name'=>'Apple'
            ],
            [
                'id'=>2,
                'orchards_name'=>'Banana'
            ],
            [
                'id'=>3,
                'orchards_name'=>'Cherry'
            ],
            [
                'id'=>4,
                'orchards_name'=>'Dragon Fruit'
            ],
            [
                'id'=>5,
                'orchards_name'=>'Grape'
            ],
            [
                'id'=>6,
                'orchards_name'=>'Kiwi'
            ],
            [
                'id'=>7,
                'orchards_name'=>'Lemon'
            ],
            [
                'id'=>8,
                'orchards_name'=>'Litchi'
            ],
            [
                'id'=>9,
                'orchards_name'=>'Mango'
            ],
            [
                'id'=>10,
                'orchards_name'=>'Olive'
            ],
            [
                'id'=>11,
                'orchards_name'=>'Orange'
            ],
            [
                'id'=>12,
                'orchards_name'=>'Papaya'
            ],
            [
                'id'=>13,
                'orchards_name'=>'Plum'
            ]
        ];
        foreach ($orchards as $orchard){
            Orchards::query()->create($orchard);
        }
    }
}
