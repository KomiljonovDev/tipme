<?php

namespace Database\Factories;

use App\Models\CategoryTranslation;
use Illuminate\Database\Eloquent\Factories\Factory;

class CategoryTranslationFactory extends Factory
{
    protected $model = CategoryTranslation::class;

    public function definition()
    {
        return [
            'category_id' => \App\Models\Category::factory(),
            'locale' => $this->faker->locale,
            'name' => $this->faker->word,
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
