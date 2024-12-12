<?php

namespace Database\Factories;

use App\Models\RegulatoryDocument;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\RegulatoryDocumentItem>
 */
class RegulatoryDocumentItemFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    use HasFactory;
    public function definition()
    {
        return [
            'regulatory_document_id' => RegulatoryDocument::factory(),
            'document'=> $this->faker->url,
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
