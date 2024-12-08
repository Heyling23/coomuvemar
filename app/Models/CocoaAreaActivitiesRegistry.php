<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CocoaAreaActivitiesRegistry extends Model
{
    use HasFactory;

    public $timestamps = true;

    protected $fillable = [
        'actividad',
        'nombre_trabajador',
        'sexo',
        'cedula',
        'dias_trabajados',
        'pago_dia',
        'pago_total',
        'pago_mensual',
        'fecha_pago',
        'firma',
        'general_data_id',
    ];
}
