<?php

namespace Database\Factories;

use App\Models\News;
use Illuminate\Database\Eloquent\Factories\Factory;

class NewsTranslationFactory extends Factory
{
    public function definition()
    {
        return [
            'news_id' => \App\Models\News::factory(),
            'locale' => $this->faker->locale,
            'title' => $this->faker->sentence,
            'description' => $this->faker->text,
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}

