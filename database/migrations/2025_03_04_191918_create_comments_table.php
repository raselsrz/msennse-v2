<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('comments', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id')->nullable(); // Foreign key for users
            $table->string('name')->nullable();
            $table->string('email')->nullable();
            $table->unsignedBigInteger('post_id'); // Foreign key for posts (or another related entity)
            $table->text('comment'); // Comment text
            $table->boolean('status')->default(0); // Comment status (0 - pending, 1 - approved, 2 - spam)
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('comments');
    }
};

