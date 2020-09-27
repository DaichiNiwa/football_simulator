<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Collection;

class LoanRecord extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'loan_option_id',
        'borrowed_date',
        'is_repaid',
    ];

    /**
     * @return BelongsTo
     */
    public function loanOption()
    {
        return $this->belongsTo('App\Models\LoanOption');
    }

    /**
     * @param User $user
     * @param LoanOption $loanOption
     * @return mixed
     */
    public static function store(User $user, LoanOption $loanOption)
    {
        $record = self::create([
            'user_id' => $user->id,
            'loan_option_id' => $loanOption->id,
            'borrowed_date' => $user->date(),
        ]);

        return $record;
    }

    /**
     * @param User $user
     * @param LoanOption $loanOption
     * @return mixed
     */
    public function repay()
    {
        $this->is_repaid = true;
        $this->save();
    }

    /**
     * @return int
     */
    public function pelicaAmount()
    {
        return $this->loanOption->pelica_amount;
    }

    /**
     * @return bool
     */
    public function canRepay()
    {
        if ($this->user_id !== Auth::user()->id) {
            return false;
        }

        if ($this->pelicaAmount() > Auth::user()->currentPelica()) {
            return false;
        }

        if ($this->is_repaid) {
            return false;
        }
        return true;
    }

    /**
     * @return int
     */
    public function deadlineDate()
    {
        $deadlineDays = $this->loanOption->repay_deadline;
        return $this->borrowed_date + $deadlineDays;
    }

    /**
     * @return bool
     */
    public function isTodayLoanDeadline()
    {
        return Auth::user()->date() === $this->deadlineDate();
    }

    /**
     * @return bool
     */
    public function isOverDeadline()
    {
        return Auth::user()->date() > $this->deadlineDate();
    }

    public function forcedRepayment()
    {
        $soldPlayers = $this->forcedSelling();
        $this->setFlashMessage($soldPlayers);
        $this->repay();
    }

    /**
     * ローンを期日までに返さなかった場合、ここで強制返済されます。
     * （例：10ペリカを強制返済する場合、ランダムに選手が一人ずつ売られ、
     * 売却額の合計が10ペリカ以上になった時点で返済が完了となります）
     * @param Collection $result
     * @return void
     */
    private function forcedSelling()
    {
        $repayPrice = $this->pelicaAmount();

        $affiliations = Auth::user()->affiliations->shuffle();
        $sellingPlayersPriceSum = 0;
        $soldPlayers = new Collection();

        foreach ($affiliations as $affiliation) {
            $sellingPlayersPriceSum += $affiliation->currentPrice();
            $affiliation->endContract();

            $soldPlayers->push($affiliation);

            if ($sellingPlayersPriceSum >= $repayPrice) {
                break;
            }
        }

        return $soldPlayers;
    }

    public function setFlashMessage(Collection $soldPlayers)
    {
        $notice = 'ローンを返済しないまま期日を過ぎてしまったため、以下の選手を強制売却し、返済が行われました。';
        $detail = '';

        foreach ($soldPlayers as $affiliation) {
            $detail .= "\r\n" . $affiliation->player->name . '：' . $affiliation->currentPrice() . 'ペリカ　';
        }

        session()->flash('notice', $notice);
        session()->flash('detail', $detail);
    }
}
