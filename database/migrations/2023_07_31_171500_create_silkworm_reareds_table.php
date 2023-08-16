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
        Schema::create('silkworm_reareds', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(\App\Models\Silkworm::class);
            $table->foreignIdFor(\App\Models\FarmerSericultureDetails::class);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('silkworm_reareds');
    }
};
