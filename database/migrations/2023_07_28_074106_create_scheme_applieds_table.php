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
        Schema::create('scheme_applieds', function (Blueprint $table) {
            $table->id();
            $table->string('scheme_name')->nullable();
            $table->foreignIdFor(\App\Models\Schemes::class)->nullable();
            $table->foreignIdFor(\App\Models\AdditionalFarmerDetails::class)->nullable();
            $table->boolean('availed')->default(1)->nullable();
            $table->string('amount')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('scheme_applieds');
    }
};
