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
        Schema::create('farmer_sericulture_details', function (Blueprint $table) {
            $table->id();
            $table->string('sericulture_id')->nullable();
            $table->string('location');
            $table->string('acres_or_hectares')->nullable();
            $table->string('total_area');
            $table->string('size_of_rearing_unit');
            $table->string('plantation_acres_or_hectares');
            $table->string('plantation_total_area');
            $table->foreignIdFor(\App\Models\Farmers::class);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('farmer_sericulture_details');
    }
};
