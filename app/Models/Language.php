<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Language extends Model
{
    use HasFactory;

    protected $fillable = ['language', 'iso_code', 'rtl', 'default_language', 'status'];

    public function getFlagUrlAttribute()
    {
        return asset("flags/{$this->iso_code}.png");
    }
}

