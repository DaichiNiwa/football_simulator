<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

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
     * @return bool
     */
    public function isOverDeadline()
    {
        return Auth::user()->date() > $this->deadlineDate();
    }
}
