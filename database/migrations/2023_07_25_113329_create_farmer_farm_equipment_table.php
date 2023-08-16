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
        Schema::create('farmer_farm_equipment', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(\App\Models\FarmerAgricultureLandDetails::class);
            $table->foreignIdFor(\App\Models\FarmEquipment::class);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('farmer_farm_equipment');
    }
};
