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
        Schema::create('professional_details', function (Blueprint $table) {
            $table->id();
            $table->integer("doctor_id");
            $table->string("specialization")->default("");
            $table->text("clinic_affiliation")->default("");
            $table->text("certifications")->default("");
            $table->text("years_of_experience")->default("");
            $table->text("languages")->default("");
            $table->text("about")->default("");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('professional_details');
    }
};
