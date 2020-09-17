<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Affiliation extends Model
{
    use HasFactory;

    public function player()
    {
        return $this->belongsTo('App\Models\Player');
    }

    public function scopeRegular($query) {
        return $query->where('is_regular', true);
    }

    public function scopeReserve($query) {
        return $query->where('is_regular', false);
    }
}
