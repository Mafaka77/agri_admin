<?php

namespace Database\Seeders;

use App\Models\AppControls;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AppControlSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        AppControls::truncate();
        $datas=[
            [
                'download_button'=>0,
                'permission_button'=>0
            ]
        ];
        foreach ($datas as $data){
            AppControls::query()->create($data);
        }
    }
}
