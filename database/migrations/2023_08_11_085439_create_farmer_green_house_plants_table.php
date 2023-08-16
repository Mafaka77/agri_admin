<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('farmer_green_house_plants', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(\App\Models\FarmerHorticultureFarmDetails::class);
            $table->foreignIdFor(\App\Models\GreenHousePlant::class);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('farmer_green_house_plants');
    }
};
