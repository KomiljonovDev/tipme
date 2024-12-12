<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\RegulatoryDocument>
 */
class RegulatoryDocumentFactory extends Factory
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
            'name' => $this->faker->name(),
        ];
    }
}
