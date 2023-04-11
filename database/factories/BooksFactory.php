<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Books>
 */
class BooksFactory extends Factory
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
            'name' => $this->faker->sentence(3),
            'isbn' => $this->faker->numberBetween(1000,5000).'-500',
            'authors' => $this->faker->name(3),
            'number_of_pages' => $this->faker->numberBetween(100,500),
            'publisher' =>$this->faker->name().'Books',
            'country' => $this->faker->unique()->country(),
            'release_date' => $this->faker->date(),
        ];
    }
}
