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
        Schema::create('husbandry_type_of_breeds', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(\App\Models\TypeOfBreed::class);
            $table->foreignIdFor(\App\Models\FarmerAnimalHusbandryDetails::class);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('husbandry_type_of_breeds');
    }
};
