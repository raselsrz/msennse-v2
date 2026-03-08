<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Subscription extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'plan_id',
        'amount_paid',
        'start_date',
        'expires_at',
        'status',
    ];

    // Relationship: Subscription belongs to a user
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Relationship: Subscription belongs to a plan
    public function plan()
    {
        return $this->belongsTo(Plans::class);
    }

    public function currentPlan()
{
    return $this->hasOne(Subscription::class)->latestOfMany();
}

public function currentPlanauth()
{
    return Subscription::where('user_id', auth()->id())->latest('expires_at')->first();
}




}
