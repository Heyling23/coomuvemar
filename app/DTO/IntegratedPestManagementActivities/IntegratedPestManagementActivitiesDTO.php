<?php

namespace App\DTO\IntegratedPestManagementActivities;

class IntegratedPestManagementActivitiesDTO
{
    public string $nombre_apellido_aplicador;

    public string $plaga_enfermedad;

    public int $nivel_danio;

    public string $metodo_aplicado;

    public string $hora_aplicacion;

    public float $duracion_dias_metodo_aplicado;

    public string $resultado_aplicacion;

    public function __construct(
        string $nombre_apellido_aplicador,
        string $plaga_enfermedad,
        int $nivel_danio,
        string $metodo_aplicado,
        string $hora_aplicacion,
        float $duracion_dias_metodo_aplicado,
        string $resultado_aplicacion
    ) {
        $this->nombre_apellido_aplicador = $nombre_apellido_aplicador;
        $this->plaga_enfermedad = $plaga_enfermedad;
        $this->nivel_danio = $nivel_danio;
        $this->metodo_aplicado = $metodo_aplicado;
        $this->hora_aplicacion = $hora_aplicacion;
        $this->duracion_dias_metodo_aplicado = $duracion_dias_metodo_aplicado;
        $this->resultado_aplicacion = $resultado_aplicacion;
    }
}
