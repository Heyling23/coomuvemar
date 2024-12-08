<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FertilizerApplicationRecord extends Model
{
    use HasFactory;

    public $timestamps = true;

    protected $fillable = [
        'nombre_fertilizante',
        'lugar_aplicacion'.
        'tipo_insumo',
        'procedencia_fertilizante',
        'dosis_planta',
        'dosis_manzana',
        'veces_aplicado_anio',
        'general_data_id',
    ];
}
