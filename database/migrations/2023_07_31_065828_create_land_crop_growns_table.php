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
        Schema::create('land_crop_growns', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(\App\Models\LandCrop::class);
            $table->foreignIdFor(\App\Models\FarmerLandWaterConservation::class);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('land_crop_growns');
    }
};
