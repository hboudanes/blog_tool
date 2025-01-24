<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Post>
 */
class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $title = $this->faker->sentence; // Generate a fake title
        return [
            'user_id' => 1, // Associate with a user
            'title' => $title,
            'slug' => Str::slug($title), // Generate a slug from the title
            'content' => $this->faker->randomHtml(2, 3), // Generate HTML content
            'status' => $this->faker->boolean, // Random status (true/false)
        ];
    }
}
