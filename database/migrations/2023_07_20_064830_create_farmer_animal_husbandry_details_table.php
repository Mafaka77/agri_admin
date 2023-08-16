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
        Schema::create('farmer_animal_husbandry_details', function (Blueprint $table) {
            $table->id();
            $table->string('husbandry_id')->nullable();
            $table->string('location')->nullable();
            $table->string('adult_male');
            $table->string('adult_female');
            $table->string('young_stock');
            $table->string('total');
            $table->string('no_of_poultry');
            $table->foreignIdFor(\App\Models\Farmers::class);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('farmer_animal_husbandry_details');
    }
};
