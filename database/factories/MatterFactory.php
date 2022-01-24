<?php

namespace Database\Factories;

use App\Models\Client;
use App\Models\Matter;
use Illuminate\Database\Eloquent\Factories\Factory;

class MatterFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Matter::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $end_at = $this->faker->date('Y-m-d', '2023-04-01');

        return [
            'name' => $this->faker->name(),
            'client_id' => Client::factory(),
            'start_at' => $this->faker->date('Y-m-d', $end_at),
            'end_at' => $end_at,
        ];
    }
}
