<?php

namespace Database\Factories;

use App\Models\Hack;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Comment>
 */
class CommentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'body' => $this->faker->sentence,
            'user_id' => function () {
                return User::factory()->create()->id;
            },
            'hack_id' => function () {
                return Hack::factory()->create()->id;
            }
        ];
    }
}
