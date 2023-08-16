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
        Schema::create('poultry_type_of_farms', function (Blueprint $table) {
            $table->id();
            $table->string('type_name');
            $table->foreignIdFor(\App\Models\FarmerAnimalHusbandryDetails::class);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('poultry_type_of_farms');
    }
};
