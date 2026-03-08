<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\GenerateUniqueSlugTrait;

class Plans extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 
        'price', 
        'duration_days',
        'status',
    ];

    // Relationship: Plan has many subscriptions
    public function subscriptions()
    {
        return $this->hasMany(Subscription::class);
    }




}
