<?php

namespace App\DTO\PesticideApplicationRecord;

class PesticideApplicationRecordDTO
{
    public string $nombres_apellidos_aplicadores;

    public string $plaga_enfermedad;

    public string $nombre_producto;

    public string $fecha_aplicacion;

    public string $hora_aplicacion;

    public float $onzas_dosis_bombadas;

    public string $lugar_cultivo_producto_aplicado;

    public float $mz_area_producto_aplicado;

    public float $litros_total_volumen_aplicado;

    public function __construct(
        string $nombres_apellidos_aplicadores,
        string $plaga_enfermedad,
        string $nombre_producto,
        string $fecha_aplicacion,
        string $hora_aplicacion,
        float $onzas_dosis_bombadas,
        float $mz_area_producto_aplicado,
        string $lugar_cultivo_producto_aplicado,
        float $litros_total_volumen_aplicado
    ) {
        $this->nombres_apellidos_aplicadores = $nombres_apellidos_aplicadores;
        $this->plaga_enfermedad = $plaga_enfermedad;
        $this->nombre_producto = $nombre_producto;
        $this->fecha_aplicacion = $fecha_aplicacion;
        $this->hora_aplicacion = $hora_aplicacion;
        $this->onzas_dosis_bombadas = $onzas_dosis_bombadas;
        $this->lugar_cultivo_producto_aplicado = $lugar_cultivo_producto_aplicado;
        $this->mz_area_producto_aplicado = $mz_area_producto_aplicado;
        $this->litros_total_volumen_aplicado = $litros_total_volumen_aplicado;
    }
}
