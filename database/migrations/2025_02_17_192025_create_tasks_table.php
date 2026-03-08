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
        Schema::create('tasks', function (Blueprint $table) {
            $table->id();
            $table->string('task_name');  // Name of the task
            $table->text('description');  // Detailed description of the task
            $table->string('type');  // Type of the task (e.g., "paragraph", "image upload", etc.)
            $table->foreignId('plan_id')->constrained()->onDelete('cascade'); // Link to subscription plan
            $table->decimal('price', 15, 2)->default(0.00);  // Reward for completing the task
            $table->enum('status', ['active', 'inactive', 'completed'])->default('active');  // Task status
            $table->softDeletes();  // Allows for soft deleting tasks (won't actually remove them from the DB)
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
        Schema::dropIfExists('tasks');
    }
};
