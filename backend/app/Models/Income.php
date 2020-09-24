<?php

namespace App\Models;

use App\Enums\IncomeType;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Income extends Model
{
    use HasFactory;

    const INITIAL_BONUS = 20;
    const MATCH_PRIZE = 1;

    protected $fillable = [
        'user_id',
        'foreign_id',
        'pelica_amount',
        'type',
    ];

    /**
     * @param int $userId
     * @param int $matchId
     */
    public static function winInitialBonus() {
        self::create([
            'user_id' => Auth::user()->id,
            'foreign_id' => null,
            'pelica_amount' => self::INITIAL_BONUS,
            'type' => IncomeType::InitialBonus,
        ]);
    }

    /**
     * @param int $matchId
     */
    public static function winPrize(int $matchId) {
        self::create([
            'user_id' => Auth::user()->id,
            'foreign_id' => $matchId,
            'pelica_amount' => self::MATCH_PRIZE,
            'type' => IncomeType::MatchPrize,
        ]);
    }

    /**
     * @param int $matchId
     */
    public static function SellPlayer(Affiliation $affiliation) {
        self::create([
            'user_id' => Auth::user()->id,
            'foreign_id' => $affiliation->id,
            'pelica_amount' => $affiliation->currentPrice(),
            'type' => IncomeType::SellingPlayer,
        ]);
    }
}
