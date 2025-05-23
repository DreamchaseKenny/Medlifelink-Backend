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
        Schema::create('transactions', function (Blueprint $table) {
            $table->id();
            $table->integer("user_id");
            $table->string("status")->default("pending");
            $table->float("amount");
            $table->string("title");
            $table->string("description");
            $table->integer("credited_to");
            $table->string("gateway");
            $table->string("reference");
            $table->string("type");

            $table->string("bank_name")->nullable();
            $table->string("acc_number")->nullable();
            $table->string("acc_name")->nullable();
            $table->float("old_balance");
            $table->float("new_balance");



            

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transactions');
    }
};
