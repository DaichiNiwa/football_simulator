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

    protected $fillable = [
        'user_id',
        'player_id',
    ];

    /**
     *選手はフィールドプレーヤーが先に、ゴールキーパーが後になるように必ず並べる
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
     * @param int $player_id
     */
    public static function storeAffiliation(int $player_id)
    {
        self::create([
            'user_id' => Auth::user()->id,
            'player_id' => $player_id,
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
     * NOTE: 選手の攻撃力か守備力が1上がると市場価格も1上がります
     * @return int
     */
    public function currentPrice()
    {
        $defaultPrice = $this->player->price;
        $additionalPrice = $this->playerLevelUps()->count();
        return $defaultPrice + $additionalPrice;
    }
}
