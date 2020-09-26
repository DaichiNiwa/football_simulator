<?php

namespace App\Models;

use App\Enums\OutgoType;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Outgo extends Model
{
    use HasFactory;

    protected $table = 'outgoes';

    protected $fillable = [
        'user_id',
        'foreign_id',
        'pelica_amount',
        'type',
    ];

    /**
     * @param Player $player
     */
    public static function buyPlayer(Player $player) {
        self::create([
            'user_id' => Auth::user()->id,
            'foreign_id' => $player->id,
            'pelica_amount' => $player->price,
            'type' => OutgoType::BuyingPlayer,
        ]);
    }

    /**
     * @param LoanRecord $loanRecord
     */
    public static function loan(LoanRecord $loanRecord) {
        self::create([
            'user_id' => Auth::user()->id,
            'foreign_id' => $loanRecord->id,
            'pelica_amount' => $loanRecord->loanOption->pelica_amount,
            'type' => OutgoType::Loan,
        ]);
    }
}
