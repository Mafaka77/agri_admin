<?php

namespace Database\Seeders;

use App\Models\Gender;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class GenderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Gender::truncate();
        $genders=[
            [
                'id'=>1,
                'gender_name'=>'Male'
            ],[
                'id'=>2,
                'gender_name'=>'Female'
            ],[
                'id'=>3,
                'gender_name'=>'Others'
            ]
        ];
        foreach ($genders as $gender){
            Gender::query()->create($gender);
        }
    }
}
