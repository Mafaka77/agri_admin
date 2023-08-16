<?php

namespace Database\Seeders;

use App\Models\Schemes;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SchemeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Schemes::truncate();
        $schemes=[
            [
                'id'=>1,
                'scheme_name'=>'Pradhan Mantri Kisan Samman Nidhi (PM-KISAN)'
            ],
            [
                'id'=>2,
                'scheme_name'=>'Pradhan Mantri Fasal Bima Yojana (PMFBY)'
            ],
            [
                'id'=>3,
                'scheme_name'=>'Pradhan Mantri Krishi Sinchai Yojana (PMKSY) - Per Drop More Crop'
            ],
            [
                'id'=>4,
                'scheme_name'=>'Pradhan Mantri Krishi Sinchai Yojana (PMKSY) - Watershed'
            ],
            [
                'id'=>5,
                'scheme_name'=>'Rashtriya Krishi Vikas Yojana (RKVY)'
            ],
            [
                'id'=>6,
                'scheme_name'=>'Mission Organic Value Chain Development in NER (MOVCD-NER)'
            ],
            [
                'id'=>7,
                'scheme_name'=>'Rainfed Area Development (RAD)'
            ],
            [
                'id'=>8,
                'scheme_name'=>'National Food Security Mission (NFSM)'
            ],
            [
                'id'=>9,
                'scheme_name'=>'Sub-Mission on Agriculture Mechanization (SMAM)'
            ],
            [
                'id'=>10,
                'scheme_name'=>'Agriculture Technology Management Agency (ATMA) - Farmers'
            ],
            [
                'id'=>11,
                'scheme_name'=>'Mission for Integrated Development of Horticulture (MIDH)'
            ],

        ];
        foreach ($schemes as $scheme){
            Schemes::query()->create($scheme);
        }
    }
}
