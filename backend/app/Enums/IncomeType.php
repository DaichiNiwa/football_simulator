<?php

namespace App\Enums;

use BenSampo\Enum\Contracts\LocalizedEnum;
use BenSampo\Enum\Enum;

/**
 * @method static static OptionOne()
 * @method static static OptionTwo()
 * @method static static OptionThree()
 */
final class IncomeType extends Enum implements LocalizedEnum
{
    const InitialBonus = 0;
    const MatchPrize = 1;
    const SellingPlayer = 2;
    const Loan = 3;
}
