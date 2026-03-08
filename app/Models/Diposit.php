<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Diposit extends Model
{
    use HasFactory;

    protected $table = 'deposits';

    

    protected $fillable = ['user_id', 'amount', 'transaction_id', 'status', 'payment_method','phone_number'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function scopePending($query)
    {
        return $query->where('status', 'pending');
    }

    public function scopeCompleted($query)
    {
        return $query->where('status', 'completed');
    }

    public function scopeFailed($query)
    {
        return $query->where('status', 'failed');
    }

    public function scopeTotalAmount($query)
    {
        return $query->sum('amount');
    }

    public function scopeTotalPending($query)
    {
        return $query->where('status', 'pending')->sum('amount');
    }

    public function scopeTotalCompleted($query)
    {
        return $query->where('status', 'completed')->sum('amount');
    }


}
