<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SuppliesMaterialsPurchaseRecord extends Model
{
    use HasFactory;

    protected $fillable = [
        'nombre_producto',
        'unidad_medida',
        'cantidad',
        'categoria',
        'fecha_compra',
        'costo_unitario',
        'costo_total',
        'general_data_id',
    ];

    public $timestamps = true;
}
