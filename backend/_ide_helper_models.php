<?php

// @formatter:off
/**
 * A helper file for your Eloquent Models
 * Copy the phpDocs from this file to the correct Model,
 * And remove them from this file, to prevent double declarations.
 *
 * @author Barry vd. Heuvel <barryvdh@gmail.com>
 */


namespace App\Models{
/**
 * App\Models\Affiliation
 *
 * @property int $id
 * @property int $user_id
 * @property int $player_id
 * @property int $is_under_contract
 * @property int $is_regular
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Player $player
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\PlayerLevelUp[] $playerLevelUps
 * @property-read int|null $player_level_ups_count
 * @method static \Illuminate\Database\Eloquent\Builder|Affiliation newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Affiliation newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Affiliation query()
 * @method static \Illuminate\Database\Eloquent\Builder|Affiliation regular()
 * @method static \Illuminate\Database\Eloquent\Builder|Affiliation reserve()
 * @method static \Illuminate\Database\Eloquent\Builder|Affiliation whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Affiliation whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Affiliation whereIsRegular($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Affiliation whereIsUnderContract($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Affiliation wherePlayerId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Affiliation whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Affiliation whereUserId($value)
 */
	class Affiliation extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Income
 *
 * @property int $id
 * @property int $user_id
 * @property int|null $foreign_id
 * @property int $pelica_amount
 * @property int $type
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Income newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Income newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Income query()
 * @method static \Illuminate\Database\Eloquent\Builder|Income whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Income whereForeignId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Income whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Income wherePelicaAmount($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Income whereType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Income whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Income whereUserId($value)
 */
	class Income extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\LoanOption
 *
 * @property int $id
 * @property int $pelica_amount
 * @property int $repay_deadline
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|LoanOption newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|LoanOption newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|LoanOption query()
 * @method static \Illuminate\Database\Eloquent\Builder|LoanOption whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|LoanOption whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|LoanOption wherePelicaAmount($value)
 * @method static \Illuminate\Database\Eloquent\Builder|LoanOption whereRepayDeadline($value)
 * @method static \Illuminate\Database\Eloquent\Builder|LoanOption whereUpdatedAt($value)
 */
	class LoanOption extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\LoanRecord
 *
 * @property int $id
 * @property int $user_id
 * @property int $loan_option_id
 * @property int $borrowed_date
 * @property int $is_repaid
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\LoanOption $loanOption
 * @method static \Illuminate\Database\Eloquent\Builder|LoanRecord newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|LoanRecord newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|LoanRecord query()
 * @method static \Illuminate\Database\Eloquent\Builder|LoanRecord whereBorrowedDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|LoanRecord whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|LoanRecord whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|LoanRecord whereIsRepaid($value)
 * @method static \Illuminate\Database\Eloquent\Builder|LoanRecord whereLoanOptionId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|LoanRecord whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|LoanRecord whereUserId($value)
 */
	class LoanRecord extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Match
 *
 * @property int $id
 * @property int $user_id
 * @property int $opponent_id
 * @property int $did_win
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Match newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Match newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Match query()
 * @method static \Illuminate\Database\Eloquent\Builder|Match whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Match whereDidWin($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Match whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Match whereOpponentId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Match whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Match whereUserId($value)
 */
	class Match extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Outgo
 *
 * @property int $id
 * @property int $user_id
 * @property int $foreign_id
 * @property int $pelica_amount
 * @property int $type
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Outgo newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Outgo newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Outgo query()
 * @method static \Illuminate\Database\Eloquent\Builder|Outgo whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Outgo whereForeignId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Outgo whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Outgo wherePelicaAmount($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Outgo whereType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Outgo whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Outgo whereUserId($value)
 */
	class Outgo extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Player
 *
 * @property int $id
 * @property string $name
 * @property int $country
 * @property int $attack_level
 * @property int $defense_level
 * @property int $is_goalkeeper
 * @property int $price
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Player newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Player newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Player query()
 * @method static \Illuminate\Database\Eloquent\Builder|Player regular()
 * @method static \Illuminate\Database\Eloquent\Builder|Player whereAttackLevel($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Player whereCountry($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Player whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Player whereDefenseLevel($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Player whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Player whereIsGoalkeeper($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Player whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Player wherePrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Player whereUpdatedAt($value)
 */
	class Player extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\PlayerLevelUp
 *
 * @property int $id
 * @property int $match_id
 * @property int $affiliation_id
 * @property int $level_up_type
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|PlayerLevelUp attack()
 * @method static \Illuminate\Database\Eloquent\Builder|PlayerLevelUp defense()
 * @method static \Illuminate\Database\Eloquent\Builder|PlayerLevelUp newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|PlayerLevelUp newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|PlayerLevelUp query()
 * @method static \Illuminate\Database\Eloquent\Builder|PlayerLevelUp whereAffiliationId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PlayerLevelUp whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PlayerLevelUp whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PlayerLevelUp whereLevelUpType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PlayerLevelUp whereMatchId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PlayerLevelUp whereUpdatedAt($value)
 */
	class PlayerLevelUp extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\User
 *
 * @property int $id
 * @property string $name
 * @property string $email
 * @property \Illuminate\Support\Carbon|null $email_verified_at
 * @property string $password
 * @property string|null $two_factor_secret
 * @property string|null $two_factor_recovery_codes
 * @property string|null $club_name
 * @property string|null $club_image
 * @property string|null $remember_token
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Affiliation[] $affiliations
 * @property-read int|null $affiliations_count
 * @property-read string $profile_photo_url
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Income[] $incomes
 * @property-read int|null $incomes_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\LoanRecord[] $loanRecords
 * @property-read int|null $loan_records_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Match[] $matches
 * @property-read int|null $matches_count
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection|\Illuminate\Notifications\DatabaseNotification[] $notifications
 * @property-read int|null $notifications_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Outgo[] $outgoes
 * @property-read int|null $outgoes_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Affiliation[] $regularPlayers
 * @property-read int|null $regular_players_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\Laravel\Sanctum\PersonalAccessToken[] $tokens
 * @property-read int|null $tokens_count
 * @method static \Illuminate\Database\Eloquent\Builder|User newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User query()
 * @method static \Illuminate\Database\Eloquent\Builder|User whereClubImage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereClubName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereEmailVerifiedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereRememberToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereTwoFactorRecoveryCodes($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereTwoFactorSecret($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereUpdatedAt($value)
 */
	class User extends \Eloquent {}
}

