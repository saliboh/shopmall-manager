<?php

namespace Database\Factories;

use App\Models\MallShop;
use Illuminate\Database\Eloquent\Factories\Factory;

class MallShopFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = MallShop::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'user_id' => 1,
            'name' => $this->faker->name(),
            'floor_number' => $this->faker->numerify('##'),
        ];
    }
}
