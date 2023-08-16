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
        Schema::create('farmer_horticulture_farm_details', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(\App\Models\Farmers::class);
            $table->string('farmer_horticulture_id')->nullable();
            $table->string('location');
            $table->string('kharif_acres_or_hectares')->nullable();
            $table->string('kharif_total_area')->nullable();
            $table->string('rabi_acres_or_hectares')->nullable();
            $table->string('rabi_total_area')->nullable();
            $table->string('total_greenhouse_area')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('farmer_horticulture_farm_details');
    }
};
