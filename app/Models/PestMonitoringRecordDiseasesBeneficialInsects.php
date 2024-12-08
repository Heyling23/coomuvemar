<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

class PestMonitoringRecordDiseasesBeneficialInsects extends Model
{
    use HasFactory;

    public $timestamps = true;

    protected $fillable = [
        'fecha_monitoreo',
        'nombre_plaga_enfermedad',
        'numero_plantas_afectadas_2',
        'numero_mazorcas_afectadas_2',
        'numero_plantas_afectadas_1',
        'numero_mazorcas_afectadas_1',
        'general_data_id',
    ];
}
