<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CompletedTask extends Model
{

// Schema::create('completed_tasks', function (Blueprint $table) {
//     $table->id();
//     $table->foreignId('user_id')->constrained()->onDelete('cascade');
//     $table->foreignId('task_id')->constrained()->onDelete('cascade');
//     $table->string('type')->nullable();
//     $table->string('status')->default('active');
//     $table->timestamps();
// });

    use HasFactory;

    protected $fillable = [
        'user_id',
        'task_id',
        'type',
        'status',
    ];

    // Relationship with User
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Relationship with Task
    public function task()
    {
        return $this->belongsTo(Tasks::class);
    }















}