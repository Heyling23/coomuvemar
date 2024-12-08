<?php

namespace Database\Factories;

use App\Models\GeneralData;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends Factory<GeneralData>
 */
class GeneralDataFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nombre_productor' => $this->faker->name(),
            'codigo' => Str::random(4),
            'numero_cedula' => Str::random(14),
            'nombre_finca' => $this->faker->company(),
            'altura_nivel_mar' => $this->faker->randomFloat(2),
            'ciclo_productivo' => $this->faker->monthName(),
            'coordenadas_area_cacao' => Str::random(10),
            'departamento' => $this->faker->country(),
            'municipio' => $this->faker->city(),
            'comunidad' => $this->faker->locale(),
            'area_total_finca' => $this->faker->randomFloat(2),
            'area_cacao' => $this->faker->randomFloat(2),
            'produccion' => $this->faker->randomFloat(2),
            'desarrollo' => $this->faker->randomFloat(2),
            'variedades_cacao' => $this->faker->titleMale(),
        ];
    }
}
