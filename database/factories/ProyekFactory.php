<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ProyekFactory extends Factory
{
    public function definition(): array
    {
        return [
            'nama' => $this->faker->company,
            'lokasi' => $this->faker->city,
        ];
    }
}