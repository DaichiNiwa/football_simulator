<?php

namespace App\Services;

class CalculateScoreService
{
    //基礎シュート数の基準（2019年のJリーグの１試合の平均シュート数）
    const AVERAGE_SHOOT_COUNT = 10;

    //シュートが入る確率（13%。2019年のJリーグの平均）
    const GOAL_PERCENTAGE = 13;

    /**
     * @param int $meTotalAttackLevel
     * @param int $opponentTotalDefenseLevel
     * @return int
     */
    public function execute(int $meTotalAttackLevel, int $opponentTotalDefenseLevel)
    {
        return $this->calculateScore($meTotalAttackLevel, $opponentTotalDefenseLevel);
    }

    /**
     * @param int $meTotalAttackLevel
     * @param int $opponentTotalDefenseLevel
     * @return int
     */
    private function calculateScore(int $meTotalAttackLevel, int $opponentTotalDefenseLevel)
    {
        $totalShootCount = $this->getTotalShootCount($meTotalAttackLevel, $opponentTotalDefenseLevel);
        $score = 0;
        for ($i = 1; $i <= $totalShootCount; $i++) {
            $score += $this->tryShoot();
        }
        return $score;
    }

    /**
     * @param int $meTotalAttackLevel
     * @param int $opponentTotalDefenseLevel
     * @return int
     */
    private function getTotalShootCount(int $meTotalAttackLevel, int $opponentTotalDefenseLevel)
    {
        return $this->basicShootCount() + $this->additionalShootCount($meTotalAttackLevel, $opponentTotalDefenseLevel);
    }

    /**
     * 基礎シュート数は平均シュート数のプラスマイナス5の範囲でランダムに決まる
     * @return int
     */
    private function basicShootCount()
    {
        return mt_rand(self::AVERAGE_SHOOT_COUNT - 5, self::AVERAGE_SHOOT_COUNT + 5);
    }

    /**
     * 追加シュート数は自チームの攻撃力の合計と相手チームの守備力の差から算出
     * @param int $meTotalAttackLevel
     * @param int $opponentTotalDefenseLevel
     * @return int
     */
    private function additionalShootCount(int $meTotalAttackLevel, int $opponentTotalDefenseLevel)
    {
        $difference = $meTotalAttackLevel - $opponentTotalDefenseLevel;

        // 自分の攻撃力と相手の守備力の差が0以下の場合、追加シュート数は0
        if ($difference <= 0) {
            return 0;
        }

        $additionalShootCount = floor($difference / 5); // 5は特に根拠はなく決めた数
        return $additionalShootCount;
    }

    /**
     * 13%の確率でゴール（1点獲得）する
     * @return int
     */
    private function tryShoot()
    {
        $random_number = mt_rand(1, 100);

        if ($random_number <= self::GOAL_PERCENTAGE) {
            return 1;
        }

        return 0;
    }
}
