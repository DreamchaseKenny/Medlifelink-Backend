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
        Schema::create('ratings', function (Blueprint $table) {
            $table->id();
            $table->integer('rater');
            $table->integer('ratee');
            $table->text('feedback')->default("");
            $table->float('overall_satisfaction')->default(0);
            $table->float('communication')->default(0);
            $table->float('knowledge')->default(0);
            $table->float('bedside_manner')->default(0);

            $table->float('appointment_cancellation')->default(0);
            $table->float('no_show')->default(0);
            $table->float('waiting_time')->default(0);
            $table->float('adherence_to_treatment')->default(0);
            $table->float('average')->default(0);
            


            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ratings');
    }
};
