<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Finance extends Model
{
    protected $fillable = [
        'athlete_id',
        'bulan_tagihan',
        'tanggal',
        'jenis',
        'kategori',
        'keterangan',
        'nominal',
        'saldo_akhir',
    ];

    public function athlete()
    {
        return $this->belongsTo(Athlete::class, 'athlete_id');
    }
}