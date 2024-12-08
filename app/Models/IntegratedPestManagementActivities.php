<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class IntegratedPestManagementActivities extends Model
{
    use HasFactory;

    public $timestamps = true;

    protected $fillable = [
        'nombre_apellido_aplicador',
        'plaga_enfermedad',
        'nivel_danio',
        'metodo_aplicado',
        'hora_aplicacion',
        'duracion_dias_metodo_aplicado',
        'resultado_aplicacion',
        'general_data_id',
    ];
}
