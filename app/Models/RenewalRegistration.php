<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class RenewalRegistration extends Model
{
    use HasFactory;

    public $timestamps = true;

    protected $fillable = [
        'fecha_injertacion',
        'numero_plantas_injertada_por_mz',
        'nombre_clones_injertados',
        'nombre_proveedor',
        'general_data_id',
    ];

    public function generalData(): BelongsTo
    {
        return $this->belongsTo(GeneralData::class);
    }
}
