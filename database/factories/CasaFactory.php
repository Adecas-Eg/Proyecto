<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Casa>
 */
class CasaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->name(),
            'tipo_oferta' => fake()->randomElement(["Arriendo", "Venta", "Alquiler"]),
            'estrato' => fake()->randomElement(["1", "2", "3"]),
            'tipo_inmueble' => fake()->randomElement(["apartamento", "apartaestudio", "casa", "cabaña", "habitacion", "bodega"]),
            'direccion' => fake()->address(),
            'departamento' => fake()->country(),
            'ciudad' => fake()->country(),
            'descripcion' => fake()->text(),
            'baños' => fake()->randomElement(["1", "2", "3", "4", "5",]),
            'parqueaderos' => fake()->randomElement(["1", "2", "3", "4", "5",]),
            'pisos' => fake()->randomElement(["1", "2", "3", "4", "5",]),
            'area' => fake()->randomElement(["1", "2", "3", "4", "5",]),
            'url_3d' => fake()->text(),
            'user_id' => fake()->numberBetween(1, 50),
            'precio' => fake()->randomDigit(),
            'status' => fake()->randomElement([1, 2]),
            'casas' => fake()->imageUrl(),



        ];
    }
}