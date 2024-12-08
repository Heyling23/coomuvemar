<?php

namespace App\DTO\FertilizerApplicationRecord;

class FertilizerApplicationRecordDTO
{
    public string $nombre_fertilizante;

    public string $lugar_aplicacion;

    public string $tipo_insumo;

    public string $procedencia_fertilizante;

    public float $dosis_planta;

    public float $dosis_manzana;

    public int $veces_aplicado_anio;

    public function __construct(
        string $nombre_fertilizante,
        string $lugar_aplicacion,
        string $tipo_insumo,
        string $procedencia_fertilizante,
        float $dosis_planta,
        float $dosis_manzana,
        int $veces_aplicado_anio
    ) {
        $this->nombre_fertilizante = $nombre_fertilizante;
        $this->lugar_aplicacion = $lugar_aplicacion;
        $this->tipo_insumo = $tipo_insumo;
        $this->procedencia_fertilizante = $procedencia_fertilizante;
        $this->dosis_planta = $dosis_planta;
        $this->dosis_manzana = $dosis_manzana;
        $this->veces_aplicado_anio = $veces_aplicado_anio;
    }
}
