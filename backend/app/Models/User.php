<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Fortify\TwoFactorAuthenticatable;
use Laravel\Jetstream\HasProfilePhoto;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens;
    use HasFactory;
    use HasProfilePhoto;
    use Notifiable;
    use TwoFactorAuthenticatable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'club_name',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
        'two_factor_recovery_codes',
        'two_factor_secret',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array
     */
    protected $appends = [
        'profile_photo_url',
    ];

    public function affiliations()
    {
        return $this->hasMany('App\Models\Affiliation');
    }

    public function regular_players()
    {
        return $this->belongsToMany(
            'App\Models\Player',
            'affiliations',
            'user_id',
            'player_id',
        )->wherePivot('is_regular', true);
    }

    public function reserve_players()
    {
        return $this->belongsToMany(
            'App\Models\Player',
            'affiliations',
            'user_id',
            'player_id',
        )->wherePivot('is_regular', false);
    }

    public function goalkeepersInRegular() {
        return $this->affiliations()
            ->regular()
            ->whereHas('player', function (Builder $query) {
            $query->where('is_goalkeeper', true);
        })->get();
    }

    public function canStartMatch() {
        return $this->isElevenPlayersInRegular() && $this->isOneGoalkeeperInRegular();
    }

    public function isOneGoalkeeperInRegular() {
        return $this->goalkeepersInRegular()->count() === 1;
    }

    public function isElevenPlayersInRegular() {
        return $this->affiliations()->regular()->count() === 11;
    }

}
