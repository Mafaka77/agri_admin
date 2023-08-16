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
        Schema::create('ration_card_family_members', function (Blueprint $table) {
            $table->id();
            $table->string('rc_member_name');
            $table->string('rc_member_dob');
            $table->string('rc_member_relation');
            $table->string('rc_member_gender');
            $table->string('rc_member_epic_no');
            $table->string('rc_member_aadhaar_no');
            $table->foreignIdFor(\App\Models\Farmers::class);
            $table->foreignIdFor(\App\Models\RationCard::class);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ration_card_family_members');
    }
};
