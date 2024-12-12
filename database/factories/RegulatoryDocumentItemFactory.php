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
    public function definition(): array
    {
        return [
            'regulatory_document_id' => RegulatoryDocument::factory(),
            'name' => $this->faker->name(),
            'document'=>$this->faker->url()
        ];
    }
}
