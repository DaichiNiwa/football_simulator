<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Collection as CollectionAlias;
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
        'club_image',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
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
     * @return HasMany
     */
    public function affiliations()
    {
        return $this->hasMany('App\Models\Affiliation');
    }

    /**
     * @return HasMany
     */
    public function matches()
    {
        return $this->hasMany('App\Models\Match');
    }

    /**
     * @return HasMany
     */
    public function incomes()
    {
        return $this->hasMany('App\Models\Income');
    }

    /**
     * @return HasMany
     */
    public function outgoes()
    {
        return $this->hasMany('App\Models\Outgo');
    }

    /**
     * @return HasMany
     */
    public function loanRecords()
    {
        return $this->hasMany('App\Models\LoanRecord');
    }

    /**
     * @return HasMany
     */
    public function regularPlayers()
    {
        return $this->affiliations()->regular();
    }

    /**
     * @return Builder[]|CollectionAlias|HasMany[]
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
    public function clubStrength() {
        if (!$this->canStartMatch()) {
            return null;
        }

        return $this->sumRegularPlayersStrength();
    }

    /**
     * @return int
     */
    public function wonMatchesCountAgainst(User $opponent) {
        return $this->matches()
            ->where('opponent_id', $opponent->id)
            ->where('did_win', true)
            ->count();
    }

    /**
     * @return int
     */
    public function lostMatchesCountAgainst(User $opponent) {
        return $this->matches()
            ->where('opponent_id', $opponent->id)
            ->where('did_win', false)
            ->count();
    }

    /**
     * ゲーム内の日付
     * 第1日目から始まり、1試合やるごとに1日進みます。
     * @return int
     */
    public function date() {
        return 1 + $this->matches()->count();
    }

    /**
     * @return int
     */
    public function currentPelica() {
        $totalIncome = $this->incomes()->sum('pelica_amount');
        $totalOutgo = $this->outgoes()->sum('pelica_amount');
        return $totalIncome - $totalOutgo;
    }

    /**
     * @return LoanRecord | null
     */
    public function unpaidLoan() {
        $UnpaidLoan = $this->loanRecords()->where('is_repaid', false)->first();
        return $UnpaidLoan;
    }

    /**
     * @return bool
     */
    public function hasUnpaidLoan() {
        $hasUnpaidLoan = $this->unpaidLoan();
        return isset($hasUnpaidLoan);
    }

    /**
     * @return bool
     */
    public function isOverLoanDeadline() {
        return $this->hasUnpaidLoan() && $this->unpaidLoan()->isOverDeadline();
    }

    /**
     * @return bool
     */
    public function isTodayLoanDeadline() {
        return $this->hasUnpaidLoan() && $this->unpaidLoan()->isTodayLoanDeadline();
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

    /**
     * @return int
     */
    private function sumRegularPlayersStrength() {
        $regularPlayers = $this->regularPlayers()->get();
        $sum = 0;

        foreach ($regularPlayers as $regularPlayer) {
            $sum += $regularPlayer->currentStrength();
        }

        return $sum;
    }

    /**
     * @return int
     */
    public function totalAttackLevelOfRegularPlayers() {
        $regularPlayers = $this->regularPlayers()->get();
        $sum = 0;

        foreach ($regularPlayers as $regularPlayer) {
            $sum += $regularPlayer->currentAttackLevel();
        }

        return $sum;
    }

    /**
     * @return int
     */
    public function totalDefenseLevelOfRegularPlayers() {
        $regularPlayers = $this->regularPlayers()->get();
        $sum = 0;

        foreach ($regularPlayers as $regularPlayer) {
            $sum += $regularPlayer->currentDefenseLevel();
        }

        return $sum;
    }
}
