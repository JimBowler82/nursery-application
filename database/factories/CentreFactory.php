<?php

namespace Database\Factories;

use App\Models\Centre;
use Illuminate\Database\Eloquent\Factories\Factory;

class CentreFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Centre::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->company(),
            'type' => 'centre',
            'description' => $this->faker->text($maxNbChars = 200)
        ];
    }

    /**
     * Indicate that the model's type is centre.
     *
     * @return Factory
     */
    public function centre()
    {
        return $this->state(function(array $attributes) {
            return [
                'type' => 'centre'
            ];
        });
    }

    /**
     * Indicate that the model's type is setting.
     *
     * @return Factory
     */
    public function setting()
    {
        return $this->state(function(array $attributes) {
            return [
                'type' => 'setting',
            ];
        });
    }
}
