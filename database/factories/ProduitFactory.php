<?php

namespace Database\Factories;

use App\Models\categorie;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\produit>
 */
class ProduitFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            //
            'nom' => fake()->name(),
            'description' => fake()->realText(310),
            'prix' => fake()->randomFloat(5,2,5),
            'image_url' => fake()->imageUrl(format:'png'),
            'stock' => fake()->numberBetween(10,200),
            'categorie_id' => categorie::all()->random()->id,
        ];
    }
}
