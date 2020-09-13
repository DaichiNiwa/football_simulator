<?php

namespace App\Models;

use App\Enums\Country;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

class Player extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'country',
        'attack_level',
        'defense_level',
        'is_goalkeeper',
        'price',
    ];


    /**
     *選手はフィールドプレーヤーが先に、ゴールキーパーが後になるように必ず並べる
     * @param  \Illuminate\Database\Eloquent\Builder  $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    protected static function boot()
    {
        parent::boot();
        static::addGlobalScope('order', function (Builder $builder) {
            $builder->orderBy('is_goalkeeper');
        });
    }

    /**

     * @param  \Illuminate\Database\Eloquent\Builder  $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeRegular($query)
    {
        return $query->where('votes', '>', 100);
    }



    /**
     * @return string 出身国名
     */
    public function country()
    {
        return Country::getDescription($this->country);
    }
}
