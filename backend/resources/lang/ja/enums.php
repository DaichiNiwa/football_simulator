<?php

use App\Enums\Country;
use App\Enums\PlayerSkillType;

return [
    Country::class => [
        Country::UK => 'イギリス',
        Country::Japan => '日本',
        Country::Spain => 'スペイン',
        Country::Germany => 'ドイツ',
        Country::France => 'フランス',
        Country::Argentina => 'アルゼンチン',
        Country::Portugal => 'ポルトガル',
        Country::Thailand => 'タイ',
        Country::Belgium => 'ベルギー',
    ],

    PlayerSkillType::class => [
        PlayerSkillType::ATTACK => '攻撃力',
        PlayerSkillType::DEFENSE => '守備力',
    ],
];
