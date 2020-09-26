<?php

use App\Enums\Country;
use App\Enums\IncomeType;
use App\Enums\OutgoType;
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
        PlayerSkillType::Attack => '攻撃力',
        PlayerSkillType::Defense => '守備力',
    ],

    IncomeType::class => [
        IncomeType::InitialBonus => '初回ボーナス',
        IncomeType::MatchPrize => '賞金',
        IncomeType::SellingPlayer => '選手売却',
        IncomeType::Loan => 'ローン',
    ],

    OutgoType::class => [
        OutgoType::BuyingPlayer => '選手契約',
        OutgoType::Loan => 'ローン',
    ],
];
