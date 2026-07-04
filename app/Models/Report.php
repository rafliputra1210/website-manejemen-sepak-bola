<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Report extends Model
{
    protected $fillable = [
        'athlete_id',
        'periode',
        'daftar_nilai',
        'progres_skill',
        'prestasi',
        'catatan_pelatih',
    ];

    protected $casts = [
        'daftar_nilai' => 'array',
    ];

    public function athlete()
    {
        return $this->belongsTo(Athlete::class);
    }
}
