<?php

namespace App\DTO\CocoaAreaActivitiesRegistry;

class CocoaAreaActivitiesRegistryDTO
{
    public string $actividad;

    public string $nombre_trabajador;

    public string $sexo;

    public string $cedula;

    public int $dias_trabajados;

    public float $pago_dia;

    public float $pago_total;

    public float $pago_mensual;

    public string $fecha_pago;

    public string $firma;

    public function __construct(
        string $actividad,
        string $nombre_trabajador,
        string $sexo,
        string $cedula,
        int $dias_trabajados,
        float $pago_dia,
        float $pago_total,
        float $pago_mensual,
        string $fecha_pago,
        string $firma
    ) {
        $this->actividad = $actividad;
        $this->nombre_trabajador = $nombre_trabajador;
        $this->sexo = $sexo;
        $this->cedula = $cedula;
        $this->dias_trabajados = $dias_trabajados;
        $this->pago_dia = $pago_dia;
        $this->pago_total = $pago_total;
        $this->pago_mensual = $pago_mensual;
        $this->fecha_pago = $fecha_pago;
        $this->firma = $firma;
    }
}
