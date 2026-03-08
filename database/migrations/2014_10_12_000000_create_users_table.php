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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('username')->unique()->nullable();
            $table->string('email')->unique();
            $table->string('phone')->unique()->nullable();
            $table->string('password');
            
            // User Profile Details
            $table->date('dob')->nullable();
            $table->string('address')->nullable();
            $table->string('nid')->nullable()->unique(); // National ID (if needed)
            $table->string('profile_image')->nullable();
        
            // Wallet & Earnings
            $table->decimal('wallet_balance', 15, 2)->default(0.00);
            $table->decimal('total_earned', 15, 2)->default(0.00);
            $table->decimal('total_withdrawn', 15, 2)->default(0.00);

            $table->string('task_cat')->nullable();
        
            // Foreign Key for current_plan_id
            $table->foreignId('current_plan_id')->nullable();
            $table->timestamp('plan_expires_at')->nullable();
        
            // Referral System
            $table->foreignId('referrer_id')->nullable()->constrained('users')->nullOnDelete();
            $table->integer('referral_count')->default(0);
            $table->decimal('referral_earnings', 15, 2)->default(0.00);
        
            // Security & Authentication
            $table->enum('status', ['active', 'inactive'])->default('active');
            $table->string('two_factor_secret')->nullable();
            $table->string('two_factor_recovery_codes')->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->rememberToken();
            $table->softDeletes();
            $table->timestamps();
            
            // Indexes for Performance
            $table->index(['email', 'username', 'phone']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
};
