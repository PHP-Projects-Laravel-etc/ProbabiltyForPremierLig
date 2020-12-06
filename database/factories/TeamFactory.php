<?php

namespace Database\Factories;

use App\Models\Team;
use Illuminate\Database\Eloquent\Factories\Factory;

class TeamFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Team::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'overall_strength'     => $this->faker->numberBetween(1, 10),
            'overall_agility'      => $this->faker->numberBetween(1, 10),
            'overall_intelligence' => $this->faker->numberBetween(1, 10),
        ];
    }
}
