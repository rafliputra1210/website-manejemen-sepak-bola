<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Finance extends Model
{
    protected $fillable = [
        'tanggal',
        'jenis',
        'kategori',
        'keterangan',
        'nominal',
        'saldo_akhir',
    ];
}
