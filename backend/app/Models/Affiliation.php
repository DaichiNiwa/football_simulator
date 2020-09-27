<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Facades\Auth;

class Affiliation extends Model
{
    use HasFactory;

    const PRICE_DOWN_RATE = 0.8;

    protected $fillable = [
        'user_id',
        'player_id',
        'is_under_contract',
        'is_regular',
    ];

    /**
     *売却して契約が終わった選手は一切表示しない
     * @param  \Illuminate\Database\Eloquent\Builder  $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    protected static function boot()
    {
        parent::boot();
        static::addGlobalScope('order', function (Builder $builder) {
            $builder->where('is_under_contract', true);
        });
    }

    /**
     * @return BelongsTo
     */
    public function playerLevelUps()
    {
        return $this->hasMany('App\Models\PlayerLevelup');
    }

    /**
     * @return BelongsTo
     */
    public function player()
    {
        return $this->belongsTo('App\Models\Player');
    }

    /**
     * @param $query
     * @return mixed
     */
    public function scopeRegular($query)
    {
        return $query->where('is_regular', true);
    }

    /**
     * @param $query
     * @return mixed
     */
    public function scopeReserve($query)
    {
        return $query->where('is_regular', false);
    }

    /**
     * @param Player $player
     */
    public static function store(Player $player)
    {
        self::create([
            'user_id' => Auth::user()->id,
            'player_id' => $player->id,
        ]);
    }

    /**
     * @param int $player_id
     */
    public function currentStrength()
    {
        $currentStrength = $this->currentAttackLevel() + $this->currentDefenseLevel();
        return $currentStrength;
    }

    /**
     * @return int
     */
    public function currentAttackLevel()
    {
        $defaultAttackLevel = $this->player->attack_level;
        $levelUp = $this->playerLevelUps()->attack()->count();
        return $defaultAttackLevel + $levelUp;
    }

    /**
     * @return int
     */
    public function currentDefenseLevel()
    {
        $defaultDefenseLevel = $this->player->defense_level;
        $levelUp = $this->playerLevelUps()->defense()->count();
        return $defaultDefenseLevel + $levelUp;
    }

    /**
     * 選手のデフォルトの売却価格は契約したときの価格より一定の割合で下がります。
     * 選手の攻撃力か守備力が1上がると市場価格も1上がります
     * @return int
     */
    public function currentPrice()
    {
        $defaultPrice = $this->player->price * self::PRICE_DOWN_RATE;
        $additionalPrice = $this->playerLevelUps()->count();
        $currentPrice = floor($defaultPrice + $additionalPrice);

        if ($currentPrice < 1) {
            $currentPrice = 1;
        }
        return $currentPrice;
    }

    /**
     */
    public function endContract()
    {
        $this->is_under_contract = false;
        $this->save();
    }
}
