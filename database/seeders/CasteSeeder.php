<?php

namespace Database\Seeders;

use App\Models\Caste;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CasteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Caste::truncate();
        $castes=[
            [
                'id'=>1,
                'caste'=>'ST'
            ],
            [
                'id'=>2,
                'caste'=>'SC'
            ],
            [
                'id'=>3,
                'caste'=>'OBC'
            ],

        ];
        foreach ($castes as $caste){
             Caste::query()->create($caste);
        }
    }
}
