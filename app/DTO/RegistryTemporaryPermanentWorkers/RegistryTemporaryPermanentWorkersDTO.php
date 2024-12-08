<?php

namespace App\DTO\RegistryTemporaryPermanentWorkers;

class RegistryTemporaryPermanentWorkersDTO
{
    public string $nombres_apellidos;

    public string $sexo;

    public string $cedula;

    public bool $es_temporal;

    public int $numero_dias_trabajados_mes;

    public int $numero_dias_trabajados_anio;

    public function __construct(
        string $nombres_apellidos,
        string $sexo,
        string $cedula,
        bool $es_temporal,
        int $numero_dias_trabajados_mes,
        int $numero_dias_trabajados_anio
    ) {
        $this->nombres_apellidos = $nombres_apellidos;
        $this->sexo = $sexo;
        $this->cedula = $cedula;
        $this->es_temporal = $es_temporal;
        $this->numero_dias_trabajados_anio = $numero_dias_trabajados_anio;
        $this->numero_dias_trabajados_mes = $numero_dias_trabajados_mes;
    }
}
