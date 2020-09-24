<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Match extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id',
        'opponent_id',
        'did_win',
    ];

    /**
     * @param User $me
     * @param User $opponent
     * @return bool
     */
    public static function canStart(User $me, User $opponent)
    {
        return $me->canStartMatch() && $opponent->canStartMatch();
    }
}
