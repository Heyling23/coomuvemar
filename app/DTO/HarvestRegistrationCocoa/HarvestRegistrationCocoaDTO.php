<?php

namespace App\DTO\HarvestRegistrationCocoa;

class HarvestRegistrationCocoaDTO
{
    public string $fecha;

    public int $cantidad_mazorcas;

    public float $qq_baba_cacao;

    public float $precio_qq;

    public function __construct(
        string $fecha,
        int $cantidad_mazorcas,
        float $precio_qq,
        float $qq_baba_cacao
    ) {
        $this->fecha = $fecha;
        $this->cantidad_mazorcas = $cantidad_mazorcas;
        $this->precio_qq = $precio_qq;
        $this->qq_baba_cacao = $qq_baba_cacao;
    }
}
