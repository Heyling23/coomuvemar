<?php

namespace App\DTO\PestMonitoringRecordDiseasesBeneficialInsects;

class PestMonitoringRecordDiseasesBeneficialInsectsDTO
{
    public string $fecha_monitoreo;

    public string $nombre_plaga_enfermedad;

    public int $numero_plantas_afectadas_2;
    public int $numero_mazorcas_afectadas_2;
    public int $numero_plantas_afectadas_1;
    public int $numero_mazorcas_afectadas_1;

    public function __construct(
        string $fecha_monitoreo,
        string $nombre_plaga_enfermedad,
        int $numero_plantas_afectadas_2,
        int $numero_mazorcas_afectadas_2,
        int $numero_plantas_afectadas_1,
        int $numero_mazorcas_afectadas_1
    ) {
        $this->nombre_plaga_enfermedad = $nombre_plaga_enfermedad;
        $this->fecha_monitoreo = $fecha_monitoreo;
        $this->numero_mazorcas_afectadas_1 = $numero_mazorcas_afectadas_1;
        $this->numero_mazorcas_afectadas_2 = $numero_mazorcas_afectadas_2;
        $this->numero_plantas_afectadas_1 = $numero_plantas_afectadas_1;
        $this->numero_plantas_afectadas_2 = $numero_plantas_afectadas_2;
    }
}
