<?php

namespace Database\Factories;

use App\Enums\Country;
use App\Models\Player;
use Illuminate\Database\Eloquent\Factories\Factory;

class PlayerFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Player::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name,
            'country' => Country::getRandomValue(),
            'attack_level' => random_int(1, 100),
            'defense_level' => random_int(1, 100),
            'is_goalkeeper' => random_int(0, 1),
            'price' => random_int(1, 100),
        ];
    }
}
