<?php

namespace Database\Seeders;

use App\Models\Roles;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Roles::truncate();
        $roles=[
            [
                'id'=>1,
                'name'=>'Super Admin'
            ],[
                'id'=>2,
                'name'=>'Supervisor'
            ],[
                'id'=>3,
                'name'=>'Enumerator'
            ]
        ];
        foreach ($roles as $role){
            Roles::query()->create($role);
        }
    }
}
