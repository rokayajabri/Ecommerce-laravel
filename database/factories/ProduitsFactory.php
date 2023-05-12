<?php

namespace Database\Factories;

use App\Models\Categories;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\odel=Produits>
 */
class ProduitsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $produit_name= $this->faker->unique()->words($nb=6,$asText=true);
        $slug =Str::slug($produit_name,'-');
        return [
            'nom_produit'=>$produit_name,
            'slug'=>$slug,
            'description_pro'=>$this->faker->text(200),
            'stock_status'=>'instock',
            'prix'=>$this->faker->numberBetween(100,500),
            'quantity'=>$this->faker->numberBetween(10,50),
            'category_id'=>Categories::factory(),
            'image'=>'product-'.$this->faker->numberBetween(1,16)
        ];
    }
}
