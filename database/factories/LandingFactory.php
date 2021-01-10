<?php

namespace Database\Factories;

use App\Models\Landing;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class LandingFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Landing::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $name = $this->faker->name;
        return [
            'name' => $name,
            'slug' => Str::slug($name),
            'description' => $this->faker->text,
            'options' => null
        ];
    }
}
