<?php

namespace Database\Seeders;

use App\Models\Silkworm;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SilkwormSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Silkworm::truncate();
        $silkWorm=[
            [
                'id'=>1,
                'silkworm_name'=>'Eri'
            ],
            [
                'id'=>2,
                'silkworm_name'=>'Muga'
            ],
            [
                'id'=>3,
                'silkworm_name'=>'Mulberry'
            ],
            [
                'id'=>4,
                'silkworm_name'=>'Tasar'
            ]
        ];
        foreach ($silkWorm as $data){
            Silkworm::query()->create($data);
        }
    }
}
