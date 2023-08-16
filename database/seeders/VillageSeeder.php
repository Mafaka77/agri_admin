<?php

namespace Database\Seeders;

use App\Models\Village;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class VillageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Village::truncate();
        $csvFile = fopen(base_path("database/data/village_lgd_code.csv"), "r");
        $firstline = true;
        while (($data = fgetcsv($csvFile, 2000, ",")) !== FALSE) {
            if (!$firstline) {
                Village::query()->create([
                    "id"=>$data['0'],
                    "village_name" => $data['2'],
                    "village_lgd_code" => $data['1'],
                    "block_id"=>$data['3']
                ]);
            }
            $firstline = false;
        }

        fclose($csvFile);
    }
}
