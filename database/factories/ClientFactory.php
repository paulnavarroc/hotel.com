<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\TipoDocumento;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Client>
 */
class ClientFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'tipo_documento_id' => TipoDocumento::all()->random()->id,
            'numero_documento' => $this->faker->randomNumber(8, true),
            'name' => $this->faker->name(),
            'age' => $this->faker->randomNumber(2),
            'address' => $this->faker->address(),
            'phone' => $this->faker->phoneNumber(),
            'ocupacion' => $this->faker->jobTitle(),
            'state' => $this->faker->boolean()
        ];
    }
}
