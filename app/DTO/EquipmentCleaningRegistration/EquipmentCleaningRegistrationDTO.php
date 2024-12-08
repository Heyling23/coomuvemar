<?php

namespace App\DTO\EquipmentCleaningRegistration;

class EquipmentCleaningRegistrationDTO
{
    public string $actividad;

    public string $equipo;

    public string $fecha_uso;

    public array $productos_usados_limpiar_producto;

    public function __construct(
        string $actividad,
        string $equipo,
        string $fecha_uso,
        array $productos_usados_limpiar_producto
    ) {
        $this->equipo = $equipo;
        $this->actividad = $actividad;
        $this->fecha_uso = $fecha_uso;
        $this->productos_usados_limpiar_producto = $productos_usados_limpiar_producto;
    }
}
