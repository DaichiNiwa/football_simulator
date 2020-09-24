<?php

namespace App\Models;

use App\Enums\PlayerSkillType;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Auth;

class PlayerLevelUp extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'match_id',
        'affiliation_id',
        'level_up_type',
    ];

    /**
     * @param $query
     * @return mixed
     */
    public function scopeAttack($query)
    {
        return $query->where('level_up_type', PlayerSkillType::Attack);
    }

    /**
     * @param $query
     * @return mixed
     */
    public function scopeDefense($query)
    {
        return $query->where('level_up_type', PlayerSkillType::Defense);
    }

    /**
     * @param Collection $result
     * @return Collection
     */
    public static function levelUp(Collection $result)
    {
        $result->levelUpPlayer = self::selectLevelUpPlayer();
        $result->levelUpSkill = self::selectLevelUpSkill();
        self::recordLevelUp($result->matchId, $result->levelUpPlayer, $result->levelUpSkill);

        return $result;
    }

    /**
     * @return Affiliation
     */
    private static function selectLevelUpPlayer()
    {
        return Auth::user()->affiliations()->regular()->get()->random();
    }

    /**
     * @return instance of PlayerSkillType
     */
    private static function selectLevelUpSkill()
    {
        // NOTE: 攻撃力か守備力をランダムで決めて、Enumインスタンスを返します。
        return PlayerSkillType::getRandomInstance();
    }

    private static function recordLevelUp(int $matchId, Affiliation $levelUpPlayer, $levelUpSkill)
    {
        self::create([
            'match_id' => $matchId,
            'affiliation_id' => $levelUpPlayer->id,
            'level_up_type' => $levelUpSkill->value,
        ]);
    }
}
