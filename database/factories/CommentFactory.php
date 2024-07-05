<?php

namespace Database\Factories;

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
    public function definition(): array
    {
        return [
            'content' => fake()->realText,
            'commentable_type' => 'App\\Models\\' . fake()->word,
            'commentable_id' => random_int(0, now()->timestamp),
            'user_id' => User::select('id')->get()->random()->id
        ];
    }
}
