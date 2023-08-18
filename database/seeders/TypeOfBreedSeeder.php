<?php

namespace Database\Seeders;

use App\Models\TypeOfBreed;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TypeOfBreedSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $breed=TypeOfBreed::truncate();
        $breeds=[
            [
                'name'=>'Crossbred',
            ],
            [
                'name'=>'Indigenous',
            ]
        ];
        foreach ($breeds as $breed){
            TypeOfBreed::query()->create($breed);
        }
    }
}
