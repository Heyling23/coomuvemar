<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SamplingTwo extends Model
{
    use HasFactory;

    public $timestamps = true;

    protected $fillable = [
        'numero_plantas_afectadas',
        'numero_mazorcas_afectadas',
        'pest_monitoring_record_diseases_beneficial_insects_id',
    ];
}
