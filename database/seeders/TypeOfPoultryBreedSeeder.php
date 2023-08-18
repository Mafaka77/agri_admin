<?php

namespace Database\Seeders;

use App\Models\TypeOfPoultryBreed;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TypeOfPoultryBreedSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        TypeOfPoultryBreed::truncate();
        $breeds=[
            [
                'name'=>'Broiler'
            ],
            [
                'name'=>'Layer'
            ]
        ];
        foreach ($breeds as $breed){
            TypeOfPoultryBreed::query()->create($breed);
        }
    }
}
