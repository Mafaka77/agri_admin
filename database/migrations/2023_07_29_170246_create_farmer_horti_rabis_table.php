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
        Schema::create('farmer_horti_rabis', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(\App\Models\RabiCrops::class);
            $table->foreignIdFor(\App\Models\FarmerHorticultureFarmDetails::class);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('farmer_horti_rabis');
    }
};
