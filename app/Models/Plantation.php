<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Plantation extends Model
{
    use HasFactory;

    protected $fillable = [
        'tipo_poda',
        'numero_plantas_podadas',
        'fecha_podada',
        'mz_area_podada',
        'tipo_plantacion',
        'general_data_id',
    ];

    public $timestamps = true;

    public function generalData(): BelongsTo
    {
        return $this->belongsTo(GeneralData::class);
    }
}
