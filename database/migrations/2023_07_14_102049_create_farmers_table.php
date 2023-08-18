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
        Schema::create('farmers', function (Blueprint $table) {
            $table->id();
            $table->string('farmer_id');
            $table->string('full_name');
            $table->string('dob');
            $table->string('relationship');
            $table->string('relationship_name');
            $table->string('phone_no');
            $table->string('aadhaar_no');
            $table->string('aadhaar_verify_type');
            $table->string('voter_no');
            $table->string('education_qualification');
            $table->boolean('is_farming_main_income')->default(1);
            $table->string('other_income')->nullable();
            $table->string('state_lgd_code');
            $table->string('village_lgd_code');
            $table->string('status')->default('Incomplete');
            $table->enum('verification',['Pending','Submitted','Approved','Rejected'])->default('Pending');
            $table->string('rejection_note')->nullable();
            $table->foreignIdFor(\App\Models\User::class);
            $table->foreignIdFor(\App\Models\FarmerCategory::class);
            $table->foreignIdFor(\App\Models\Gender::class);
            $table->foreignIdFor(\App\Models\Caste::class);
            $table->foreignIdFor(\App\Models\District::class);
            $table->foreignIdFor(\App\Models\SubDivision::class)->nullable();
            $table->foreignIdFor(\App\Models\Block::class);
            $table->foreignIdFor(\App\Models\Village::class);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('farmers');
    }
};
