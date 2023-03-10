<?php

namespace Database\Factories\LW;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class NewsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'title' =>\fake()->jobTitle(),
            'author' =>\fake()->userName(),
            'status'=> 'active',
            'description' => \fake()->text(100),
            'image' =>\fake()->imageUrl(),
        ];
    }
}
