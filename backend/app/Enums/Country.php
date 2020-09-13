<?php

namespace App\Enums;

use BenSampo\Enum\Contracts\LocalizedEnum;
use BenSampo\Enum\Enum;

final class Country extends Enum implements LocalizedEnum
{
    const UK = 0;
    const Japan = 1;
    const Spain = 2;
    const Germany = 3;
    const France = 4;
    const Argentina = 5;
    const Portugal = 6;
    const Thailand = 7;
}
