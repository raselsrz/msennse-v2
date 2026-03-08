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
        Schema::create('deposits', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade'); // Links to users table
           // Deposit amount whit currency
            $table->string('amount');
            $table->string('transaction_id')->unique(); // Unique transaction ID
            $table->string('phone_number');
            $table->enum('status', ['pending', 'completed', 'failed'])->default('pending'); // Deposit status
            $table->string('payment_method'); // Payment method (Bkash, Nagad, etc.)
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
        Schema::dropIfExists('deposits');
    }
};
