<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\LandHolding;
use App\Models\TypeOfPoultryBreed;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call(RolesSeeder::class);
        $this->call(UserSeeder::class);
        $this->call(GenderSeeder::class);
        $this->call(DistrictSeeder::class);
        $this->call(KharifCropsSeeder::class);
        $this->call(RabiCropsSeeder::class);
        $this->call(CasteSeeder::class);
        $this->call(LivestockSeeder::class);
        $this->call(FarmerCategorySeeder::class);
        $this->call(BlockSeeder::class);
        $this->call(OwnershipTypeSeeder::class);
        $this->call(IrrigationInfrastructureSeeder::class);
        $this->call(FarmEquipmentSeeder::class);
        $this->call(LandHoldingSeeder::class);
        $this->call(SchemeSeeder::class);
        $this->call(OrchardsSeeder::class);
        $this->call(PlantationSeeder::class);
        $this->call(LandCropSeeder::class);
        $this->call(SilkwormSeeder::class);
        $this->call(FishSeeder::class);
        $this->call(VillageSeeder::class);
        $this->call(GreenHousePlantSeeder::class);
        $this->call(TypeOfBreedSeeder::class);
        $this->call(TypeOfFarmSeeder::class);
        $this->call(TypeOfPoultryFarmSeeder::class);
        $this->call(TypeOfPoultryBreedSeeder::class);
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
