<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class EquipmentCleaningRegistration extends Model
{
    use HasFactory;

    public $timestamps = true;

    protected $fillable = [
        'actividad',
        'equipo',
        'fecha_uso',
        'productos_usados_limpiar_producto',
        'general_data_id',
    ];

    public function generalData(): BelongsTo
    {
        return $this->belongsTo(GeneralData::class);
    }
}
