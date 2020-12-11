<?php

namespace Database\Factories;

use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProductFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Product::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */


    public function definition()
    {
        return [
        'store_id'=> $this->faker->numberBetween(1,2),
        'id_subcategory'=> $this->faker->numberBetween(1,7),
        'product_name' => $this->faker->catchPhrase,
        'product_img1' => $this->faker->imageUrl($width = 200, $height = 300),
        'product_img2' => $this->faker->imageUrl($width = 200, $height = 300),
        'product_img3' => $this->faker->imageUrl($width = 200, $height = 300),
        'product_price' => $this->faker->numberBetween(1000,100000),
        'product_description' => $this->faker->realText($maxNbChars = 100, $indexSize = 2), 
        'product_condition' => $this->faker->randomElement($array = array ('Baru','Second')),
        'product_brand' => $this->faker->randomElement($array = array ('Nike','Adidas', 'Saripit')),
        'id_category' => $this->faker->numberBetween(1,3),
        ];
    }
}
