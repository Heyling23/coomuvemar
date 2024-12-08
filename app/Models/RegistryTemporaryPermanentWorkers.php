<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RegistryTemporaryPermanentWorkers extends Model
{
    use HasFactory;

    public $timestamps = true;

    protected $fillable = [
        'nombres_apellidos',
        'sexo',
        'cedula',
        'es_temporal',
        'numero_dias_trabajados_mes',
        'numero_dias_trabajados_anio',
        'general_data_id',
    ];
}
