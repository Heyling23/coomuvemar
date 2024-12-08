<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class HarvestRegistrationCocoa extends Model
{
    use HasFactory;

    protected $fillable = [
        'fecha',
        'cantidad_mazorcas',
        'qq_baba_cacao',
        'precio_qq',
        'general_data_id',
    ];

    public $timestamps = true;

    public function generalData(): BelongsTo
    {
        return $this->belongsTo(GeneralData::class);
    }
}
