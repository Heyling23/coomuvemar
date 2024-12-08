<?php

namespace App\DTO\RenewalRegistration;

class RenewalRegistrationDTO
{
    public string $fecha_injertacion;

    public int $numero_plantas_injertada_por_mz;

    public array $nombre_clones_injertados;

    public string $nombre_proveedor;

    public function __construct(
        string $fecha_injertacion,
        int $numero_plantas_injertada_por_mz,
        array $nombre_clones_injertados,
        string $nombre_proveedor
    ) {
        $this->fecha_injertacion = $fecha_injertacion;
        $this->nombre_clones_injertados = $nombre_clones_injertados;
        $this->nombre_proveedor = $nombre_proveedor;
        $this->numero_plantas_injertada_por_mz = $numero_plantas_injertada_por_mz;
    }
}
