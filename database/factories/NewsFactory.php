<?php

namespace Database\Factories;

use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\News>
 */
class NewsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    use HasFactory;
    public function definition(): array
    {
        return [
            'title' => $this->faker->title(),
            'description' => $this->faker->paragraph(),
            'image' => $this->faker->imageUrl(),
            'category_id'=>Category::factory(),
        ];
    }
}
