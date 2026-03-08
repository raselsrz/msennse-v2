<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transactions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade'); // Links to users table
            $table->decimal('amount', 15, 2); // Transaction amount
            $table->string('transaction_id')->nullable()->unique(); // Unique transaction ID
            $table->enum('type', ['deposit', 'withdrawal', 'earning', 'referral_bonus']); // Transaction type
            $table->enum('status', ['pending', 'completed', 'failed'])->default('pending'); // Status
            $table->string('payment_method')->nullable(); // Payment method (Bkash, Nagad, etc.)
            $table->text('description')->nullable(); // Transaction description
            $table->timestamps();
        });
    }
    

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('transactions');
    }
};
