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
        Schema::create('farmer_agriculture_land_details', function (Blueprint $table) {
            $table->id();
            $table->string('farmer_agri_id')->nullable();
            $table->string('land_owner_name');
            $table->string('area_of_land');
            $table->string('acres_or_hectares');
            $table->string('latitude');
            $table->string('longitude');
            $table->string('altitude')->nullable();
            $table->string('landholding_documents_number');
            $table->string('land_holding_file');
            $table->string('land_holding_file_2')->nullable();
            $table->string('land_holding_file_3')->nullable();
            $table->string('other_irrigation_infrastructure')->nullable();
            $table->string('other_farm_equipment')->nullable();
            $table->string('kharif_acres_or_hectares')->nullable();
            $table->string('kharif_total_area')->nullable();
            $table->string('rabi_acres_or_hectares')->nullable();
            $table->string('rabi_total_area')->nullable();
            $table->boolean('oil_palm_plantation')->nullable();
            $table->string('oil_palm_area')->nullable();
            $table->foreignIdFor(\App\Models\Farmers::class);
            $table->foreignIdFor(\App\Models\District::class);
            $table->foreignIdFor(\App\Models\SubDivision::class);
            $table->foreignIdFor(\App\Models\Block::class);
            $table->foreignIdFor(\App\Models\Village::class);
            $table->foreignIdFor(\App\Models\LandHolding::class);
            $table->foreignIdFor(\App\Models\OwnershipType::class);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('farmer_agriculture_land_details');
    }
};
