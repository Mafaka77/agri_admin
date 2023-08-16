<?php

namespace Database\Seeders;

use App\Models\IrrigationInfrastructures;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class IrrigationInfrastructureSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        IrrigationInfrastructures::truncate();
        $infrastructure=[
            [
                'id'=>1,
                'irrigation_infrastructures_name'=>'Tanky'
            ],
            [
                'id'=>2,
                'irrigation_infrastructures_name'=>'Sprinker'
            ],
            [
                'id'=>3,
                'irrigation_infrastructures_name'=>'Drip'
            ],
            [
                'id'=>4,
                'irrigation_infrastructures_name'=>'Irrigation',
            ],
            [
                'id'=>5,
                'irrigation_infrastructures_name'=>'RCC Channel'
            ],
        ];
        foreach ($infrastructure as $infras){
            IrrigationInfrastructures::query()->create($infras);
        }
    }
}
