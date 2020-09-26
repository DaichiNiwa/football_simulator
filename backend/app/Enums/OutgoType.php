<?php

namespace App\Enums;

use BenSampo\Enum\Enum;

/**
 * @method static static OptionOne()
 * @method static static OptionTwo()
 * @method static static OptionThree()
 */
final class OutgoType extends Enum
{
    const BuyingPlayer = 0;
    const Loan = 1;
}
