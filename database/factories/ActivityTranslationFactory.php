<?php

namespace Database\Factories;

use App\Models\ActivityTranslation;
use App\Models\Activity;
use Illuminate\Database\Eloquent\Factories\Factory;

class ActivityTranslationFactory extends Factory
{
    protected $model = ActivityTranslation::class;

    public function definition()
    {
        return [
            'activity_id' => \App\Models\Activity::factory(),
            'locale' => $this->faker->randomElement(['en', 'ru', 'uz', 'oz']),
            'name' => $this->faker->word,
            'description' => $this->faker->text,
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}

