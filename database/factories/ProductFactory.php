<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\Country;
use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $coutry = collect(Country::all()->modelKeys());
        return [
            // 'category_id' => $categoires->random(),
            'name' => $this->faker->name(),
            'country_id' => $coutry->random(),
            'description' => $this->faker->text(30),
            'price'       => $this->faker->randomNumber(rand(3, 5)),
        ];
    }

    public function configure()
    {
        $categoires = collect(Category::where('is_active', true)->get()->modelKeys());

        return $this->afterCreating(function (Product $product) use ($categoires) {
            $product->categories()->sync($categoires->random(rand(1, 3)));
        });
    }
}
