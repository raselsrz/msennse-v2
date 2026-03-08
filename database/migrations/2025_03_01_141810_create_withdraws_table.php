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
        Schema::create('withdraws', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade'); // Links to users table
            $table->decimal('amount', 15, 2); // Withdrawal amount
            $table->string('transaction_id')->nullable()->unique(); // Transaction ID (can be null until processed)
            $table->enum('status', ['pending', 'completed', 'rejected'])->default('pending'); // Withdrawal status
            $table->string('payment_method'); // Payment method (Bkash, Nagad, etc.)
            $table->string('account_number'); // User's account number
            $table->text('notes')->nullable(); // Admin notes (optional)
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
        Schema::dropIfExists('withdraw');
    }
};
