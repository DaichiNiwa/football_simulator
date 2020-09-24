<?php

namespace App\Services;

use App\Models\Income;
use App\Models\Match;
use App\Models\PlayerLevelUp;
use App\Models\User;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;

class MatchStoreService
{
    public static function execute(User $me, User $opponent)
    {
        return DB::transaction(
            function () use ($me, $opponent) {
                $result = Collection::make();

                $result = self::playMatch($me, $opponent, $result);

                if ($result->isMeWinner) {
                    $result->grew = PlayerLevelUp::levelUp($result);
                    Income::winPrize($me->id, $result->matchId);
                }
                return $result;
            });
    }


    /**
     * @param User $me
     * @param User $opponent
     * @param Collection $result
     * @return Collection
     */
    private static function playMatch(User $me, User $opponent, Collection $result)
    {
        $result->isMeWinner = self::decideWinner($me, $opponent);
        $result->matchId = self::recordMatch($me, $opponent, $result->isMeWinner);

        return $result;
    }

    /**
     * このメソッドが勝敗を決めるロジックです。
     * 例えば自分の総合力が60、相手の総合力が40の場合、
     * 1から100（2人の総合力の合計）の間で乱数を発生させ、
     * 乱数が60以下の場合、自分の勝ち、
     * 60より大きい場合、相手の勝ちとなります。
     * @param User $me
     * @param User $opponent
     * @return bool
     */
    private static function decideWinner(User $me, User $opponent)
    {
        $meWinningRate = $me->clubStrength();
        $opponentWinningRate = $opponent->clubStrength();

        $resultNumber = mt_rand(1, $meWinningRate + $opponentWinningRate);

        if ($resultNumber <= $meWinningRate) {
            return true;
        }

        return false;
    }

    /**
     * @param User $me
     * @param User $opponent
     * @param bool $isMeWinner
     */
    private static function recordMatch(User $me, User $opponent, bool $isMeWinner)
    {
        $match = Match::create([
            'user_id' => $me->id,
            'opponent_id' => $opponent->id,
            'did_win' => $isMeWinner,
        ]);

        return $match->id;
    }
}
