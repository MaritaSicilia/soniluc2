<?php

namespace Database\Factories;

use App\Models\Altavoz;
use Illuminate\Database\Eloquent\Factories\Factory;

class AltavozFactory extends Factory
{
    /**
     * El nombre del modelo asociado al factory.
     *
     * @var string
     */
    protected $model = Altavoz::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'precio' => $this->faker->randomFloat(2, 50, 500),
            'modelo' => $this->faker->word,
            'marca' => $this->faker->company,
            'foto' => $this->faker->imageUrl(),
            'descripcion' => $this->faker->paragraph,
        ];
    }
}
