<?php

namespace Database\Seeders;

use App\Models\FarmEquipment;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class FarmEquipmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        FarmEquipment::truncate();
        $equipments=[
            [
                'id'=>1,
                'equipment_name'=>'Tractor'
            ],
            [
                'id'=>2,
                'equipment_name'=>'Power Tiller'
            ],
            [
                'id'=>3,
                'equipment_name'=>'Sprayer'
            ],
            [
                'id'=>4,
                'equipment_name'=>'Brush Cutter'
            ],
        ];
        foreach ($equipments as $equipment){
            FarmEquipment::query()->create($equipment);
        }
    }
}
