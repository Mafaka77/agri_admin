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
        Schema::create('farmer_fisheries', function (Blueprint $table) {
            $table->id();
            $table->string('fisheries_id')->nullable();
            $table->string('location');
            $table->string('acres_or_hectares');
            $table->string('total_area');
            $table->integer('total_ponds')->nullable();
            $table->integer('nursery_ponds')->nullable();
            $table->integer('rearing_ponds')->nullable();
            $table->integer('grew_out_ponds')->nullable();
            $table->string('fish_hatchery')->nullable();
            $table->foreignIdFor(\App\Models\Farmers::class);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('farmer_fisheries');
    }
};
