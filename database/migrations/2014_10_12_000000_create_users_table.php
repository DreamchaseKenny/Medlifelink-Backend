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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('user_id');
            $table->string('fullname')->default('');
            $table->double('balance')->default(0.0);
            $table->string('email')->unique();
            $table->string('username')->unique();
            $table->string('phone')->default('');
            $table->string('country_code')->default('');
            $table->string('country')->default('');
            $table->string('gender')->default('');
            $table->text('address')->default('');
            $table->text('specialization')->default('');
            $table->string('verification_code')->nullable();
            $table->boolean('email_verified')->default(0);
            $table->string('status')->default('active');
            $table->string('role')->default('patient');
            $table->string('created_by')->default('');
            $table->float('rating')->default(0);

            $table->string('dob')->default('');
            $table->string('consultation_amount')->default(0);

            
            $table->string('role_id')->default(1);
            $table->timestamp('email_verified_at')->nullable();
            $table->string('weight')->default(0);
            $table->string('height')->default(0);
            $table->string('blood_pressure')->default('');
            $table->string('glucose_level')->default('');
            $table->string('photo')->default('');
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
