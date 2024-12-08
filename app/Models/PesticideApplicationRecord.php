<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PesticideApplicationRecord extends Model
{
    use HasFactory;

    public $timestamps = true;

    protected $fillable = [
        'nombres_apellidos_aplicadores',
        'plaga_enfermedad',
        'nombre_producto',
        'fecha_aplicacion',
        'hora_aplicacion',
        'onzas_dosis_bombadas',
        'lugar_cultivo_producto_aplicado',
        'mz_area_producto_aplicado',
        'litros_total_volumen_aplicado',
        'general_data_id',
    ];
}
