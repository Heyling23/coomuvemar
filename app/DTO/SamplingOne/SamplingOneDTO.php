<?php

namespace App\DTO\SamplingOne;

class SamplingOneDTO
{
    public int $numero_plantas_afectadas;

    public int $numero_mazorcas_afectadas;

    public function __construct(
        int $numero_plantas_afectadas,
        int $numero_mazorcas_afectadas
    ) {
        $this->numero_plantas_afectadas = $numero_plantas_afectadas;
        $this->numero_mazorcas_afectadas = $numero_mazorcas_afectadas;
    }
}
