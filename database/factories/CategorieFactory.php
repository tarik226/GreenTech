<?php

namespace Database\Factories;

use App\Enums\CategorieEnum;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Database\Eloquent\Models;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\categorie>
 */
class CategorieFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    { 
        return 
        [ 
            'nom' => fake()->unique()->randomElement(['jouet', 'Beaute', 'Bricolage','Cuisine','sports']),
        ];
    }
}