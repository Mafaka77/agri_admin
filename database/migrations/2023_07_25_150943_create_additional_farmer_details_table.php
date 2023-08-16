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
        Schema::create('additional_farmer_details', function (Blueprint $table) {
            $table->id();
            $table->string('ration_card_number');
            $table->string('ration_card_path');
            $table->boolean('is_kcc_availed')->default(0);
            $table->string('kcc_card_no')->nullable();
            $table->string('kcc_renew_or_new')->nullable();
            $table->string('bank_name')->nullable();
            $table->string('branch_name')->nullable();
            $table->string('year_of_amount_sanction')->nullable();
            $table->string('amount_sanction')->nullable();
            $table->string('aadhaar_card_path');
            $table->string('bank_passbook_path');
            $table->string('date_of_data_collection');
            $table->string('remarks')->nullable();
            $table->foreignIdFor(\App\Models\Farmers::class);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('additional_farmer_details');
    }
};
