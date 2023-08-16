<?php

namespace Database\Seeders;

use App\Models\District;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DistrictSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        District::truncate();
        $districts=[
            [
                'id'=>1,
                'district_code'=>'MZ01',
                'district_name'=>'Aizawl',
                'district_lgd_code'=>'261'
            ], [
                'id'=>2,
                'district_code'=>'MZ02',
                'district_name'=>'Lunglei',
                'district_lgd_code'=>'265'
            ], [
                'id'=>3,
                'district_code'=>'MZ03',
                'district_name'=>'Saiha',
                'district_lgd_code'=>'267'
            ],
            [
                'id'=>4,
                'district_code'=>'MZ04',
                'district_name'=>'Champhai',
                'district_lgd_code'=>'262'
            ],
            [
                'id'=>5,
                'district_code'=>'MZ05',
                'district_name'=>'Kolasib',
                'district_lgd_code'=>'263'
            ],
            [
                'id'=>6,
                'district_code'=>'MZ06',
                'district_name'=>'Serchhip',
                'district_lgd_code'=>'268'
            ],
            [
                'id'=>7,
                'district_code'=>'MZ07',
                'district_name'=>'Lawngtlai',
                'district_lgd_code'=>'264'
            ],
            [
                'id'=>8,
                'district_code'=>'MZ08',
                'district_name'=>'Mamit',
                'district_lgd_code'=>'266'
            ],
            [
                'id'=>9,
                'district_code'=>'MZ09',
                'district_name'=>'Saitual',
                'district_lgd_code'=>'727'
            ],
            [
                'id'=>10,
                'district_code'=>'MZ10',
                'district_name'=>'Khawzawl',
                'district_lgd_code'=>'728'
            ],
            [
                'id'=>11,
                'district_code'=>'MZ11',
                'district_name'=>'Hnahthial',
                'district_lgd_code'=>'726'
            ]
        ];
        foreach ($districts as $district){
            District::query()->create($district);
        }
    }
}
