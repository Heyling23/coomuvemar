<?php

namespace App\DTO\Plantation;

class PlantationDTO
{
    public string $tipo_poda;

    public int $numero_plantas_podadas;

    public string $fecha_podada;

    public float $mz_area_podada;

    public string $tipo_plantacion;

    public function __construct(
        string $tipo_poda,
        int $numero_plantas_podadas,
        string $fecha_podada,
        float $mz_area_podada,
        string $tipo_plantacion
    ) {
        $this->tipo_poda = $tipo_poda;
        $this->numero_plantas_podadas = $numero_plantas_podadas;
        $this->fecha_podada = $fecha_podada;
        $this->mz_area_podada = $mz_area_podada;
        $this->tipo_plantacion = $tipo_plantacion;
    }
}
