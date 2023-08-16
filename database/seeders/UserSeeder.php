<?php

namespace Database\Seeders;

use App\Models\Roles;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Roles::truncate();
        $users=[
            [
                'id'=>1,
                'name'=>'Super Admin',
                'email'=>'superadmin@email.com',
                'password'=>bcrypt('password'),
                'roles_id'=>1
            ],[
                'id'=>2,
                'name'=>'Admin',
                'email'=>'admin@email.com',
                'district_id'=>1,
                'password'=>bcrypt('password'),
                'roles_id'=>2
            ],[
                'id'=>3,
                'name'=>'User 1',
                'email'=>'user1@email.com',
                'district_id'=>1,
                'password'=>bcrypt('password'),
                'roles_id'=>3
            ],
            [
                'id'=>4,
                'name'=>'User 2',
                'email'=>'user2@email.com',
                'district_id'=>1,
                'password'=>bcrypt('password'),
                'roles_id'=>3
            ]
        ];
        foreach ($users as $user){
            User::query()->create($user);
        }
    }
}
