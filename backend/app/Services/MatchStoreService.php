<?php

namespace App\Services;

use App\Models\Income;
use App\Models\Match;
use App\Models\PlayerLevelUp;
use App\Models\User;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;

// TODO: テストを書く。リファクタする
class MatchStoreService
{
    /**
     * @param User $me
     * @param User $opponent
     * @return mixed
     */
    public function execute(User $me, User $opponent)
    {
        return DB::transaction(
            function () use ($me, $opponent) {
                $result = new Collection();

                $this->playMatch($me, $opponent, $result);

                if ($result->isMeWinner) {
                    PlayerLevelUp::levelUp($result);
                    Income::winPrize($result->matchId);
                }

                // NOTE: 試合をして1日進んだ結果、ローンの返済期限を過ぎてしまった場合、強制返済される
                if ($me->isOverLoanDeadline()) {
                    $me->unpaidLoan()->forcedRepayment();
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
    private function playMatch(User $me, User $opponent, Collection $result)
    {
        // TODO: constructでinjectionする
        $calculateScoreService = app('App\Services\CalculateScoreService');

        $result->meScore = $calculateScoreService->execute($me->totalAttackLevelOfRegularPlayers(), $opponent->totalDefenseLevelOfRegularPlayers());
        $result->opponentScore = $calculateScoreService->execute($opponent->totalAttackLevelOfRegularPlayers(), $me->totalDefenseLevelOfRegularPlayers());

        // NOTE: 同点の時は、ランダムにどちらかに1点を加えて勝敗を決める
        if ($result->meScore === $result->opponentScore) {
            if (mt_rand(0, 1) === 1) {
                $result->meScore++;
            } else {
                $result->opponentScore++;
            }
        }

        $result->isMeWinner = $this->decideWinner($result->meScore, $result->opponentScore);
        $result->matchId = $this->recordMatch($me, $opponent, $result->isMeWinner);
    }


    /**
     * @param int $meScore
     * @param int $opponentScore
     * @return bool
     */
    private function decideWinner(int $meScore, int $opponentScore)
    {
        if ($meScore > $opponentScore) {
            return true;
        }

        return false;
    }

    /**
     * @param User $me
     * @param User $opponent
     * @param bool $isMeWinner
     */
    private function recordMatch(User $me, User $opponent, bool $isMeWinner)
    {
        $match = Match::create([
            'user_id' => $me->id,
            'opponent_id' => $opponent->id,
            'did_win' => $isMeWinner,
        ]);

        return $match->id;
    }
}
