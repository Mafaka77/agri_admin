<?php

namespace Database\Seeders;

use App\Models\OwnershipType;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class OwnershipTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        OwnershipType::truncate();
        $types=[
            [
                'id'=>1,
                'ownership_type_name'=>'Owner'
            ],
            [
                'id'=>2,
                'ownership_type_name'=>'Leasee'
            ],
            [
                'id'=>3,
                'ownership_type_name'=>'Landless Cultivators'
            ],
            [
                'id'=>4,
                'ownership_type_name'=>'Others'
            ],
        ];
        foreach ($types as $type){
            OwnershipType::query()->create($type);
        }
    }
}
