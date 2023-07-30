<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Book>
 */
class BookFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $title = $this->faker->unique()->words($nb=2,$asText=true);
        return [
            'title' => $title,
            'description' => $this->faker->text(70),
            'added_by' => $this->faker->name,
            'updated_by' => 'NAN',
            'price' => $this->faker->randomFloat(2, 10, 100),
            'discount' => $this->faker->randomFloat(2, 0, 50),
            'qty' => $this->faker->numberBetween(1, 100),
            'edition' => $this->faker->word,
            'language' => $this->faker->languageCode,
            'publication_date' => $this->faker->date,
            'isbn' => $this->faker->unique()->isbn13,
            'image' => 'book-'.$this->faker->unique()->numberBetween(1,15).'.jpg',
        ];
    }
}
