<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Relations\HasMany;
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

    /**
     * @return HasMany
     */
    public function affiliations()
    {
        return $this->hasMany('App\Models\Affiliation');
    }

//    public function regular_players()
//    {
//        return $this->belongsToMany(
//            'App\Models\Player',
//            'affiliations',
//            'user_id',
//            'player_id',
//        )->wherePivot('is_regular', true);
//    }
//
//    public function reserve_players()
//    {
//        return $this->belongsToMany(
//            'App\Models\Player',
//            'affiliations',
//            'user_id',
//            'player_id',
//        )->wherePivot('is_regular', false);
//    }

    /**
     * @return HasMany
     */
    public function regularPlayers()
    {
        return $this->affiliations()->regular();
    }

    /**
     * @return Builder[]|\Illuminate\Database\Eloquent\Collection|HasMany[]
     */
    public function goalkeepersInRegular() {
        return $this->regularPlayers()
            ->whereHas('player', function (Builder $query) {
            $query->where('is_goalkeeper', true);
        })->get();
    }

    /**
     * @return bool
     */
    public function canStartMatch() {
        return $this->isElevenPlayersInRegular() && $this->isOneGoalkeeperInRegular();
    }

    /**
     * @return bool
     */
    public function ClubStrength() {
        if (!$this->canStartMatch()) {
            return null;
        }

        return $this->sumRegularPlayersStrength();
    }

    /**
     * @return bool
     */
    private function isOneGoalkeeperInRegular() {
        return $this->goalkeepersInRegular()->count() === 1;
    }

    /**
     * @return bool
     */
    private function isElevenPlayersInRegular() {
        return $this->regularPlayers()->count() === 11;
    }

    private function sumRegularPlayersStrength() {
        $regularPlayers = $this->regularPlayers()->get();
        $sum = 0;

        foreach ($regularPlayers as $regularPlayer) {
            $sum += $regularPlayer->currentStrength();
        }

        return $sum;
    }




}
