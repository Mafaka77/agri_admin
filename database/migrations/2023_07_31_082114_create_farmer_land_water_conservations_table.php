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
        Schema::create('farmer_land_water_conservations', function (Blueprint $table) {
            $table->id();
            $table->string('owner_id');
            $table->string('location');
            $table->string('total_area');
            $table->string('crops_acres_or_hectares')->nullable();
            $table->foreignIdFor(\App\Models\Farmers::class);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('farmer_land_water_conservations');
    }
};
