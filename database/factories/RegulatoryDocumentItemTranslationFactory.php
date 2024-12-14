<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class RegulatoryDocumentItemTranslationFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'regulatory_document_item_id' => \App\Models\RegulatoryDocumentItem::factory(),
            'locale' => $this->faker->randomElement(['en', 'ru', 'uz', 'oz']),
            'name' => $this->faker->sentence,
//            'document' => $this->faker->url,
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
