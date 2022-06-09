<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class UserFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = User::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name(),
            'email' => $this->faker->unique()->safeEmail(),
            'email_verified_at' => now(),
            'password' => null, // password
            'password_set_token' => Str::random(40),
            'isAdmin' => 0,
            'remember_token' => Str::random(10),
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     *
     * @return Factory
     */
    public function unverified()
    {
        return $this->state(function (array $attributes) {
            return [
                'email_verified_at' => null,
            ];
        });
    }

    /**
     * Indicate that the model is an admin.
     *
     * @return Factory
     */
    public function admin()
    {
        return $this->state(function(array $attributes)
        {
            return [
                'isAdmin' => 1,
            ];
        });
    }

    /**
     * Indicate that the model is an assessor.
     *
     * @return Factory
     */
    public function assessor()
    {
        return $this->state(function(array $attributes)
        {
            return [
                'isAdmin' => 0,
            ];
        });
    }
}
