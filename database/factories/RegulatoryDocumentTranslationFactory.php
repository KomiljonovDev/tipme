<?php

namespace Database\Factories;

use App\Models\RegulatoryDocumentItemTranslation;
use App\Models\RegulatoryDocumentItem;
use Illuminate\Database\Eloquent\Factories\Factory;

class RegulatoryDocumentItemTranslationFactory extends Factory
{
    protected $model = RegulatoryDocumentItemTranslation::class;

    public function definition()
    {
        return [
            'regulatory_document_id' => \App\Models\RegulatoryDocument::factory(),
            'locale' => $this->faker->randomElement(['en', 'ru', 'uz', 'oz']),
            'name' => $this->faker->sentence,
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}

