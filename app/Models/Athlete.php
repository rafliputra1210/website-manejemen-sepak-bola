<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @method bool|null delete()
 */
class Athlete extends Model
{
    protected $fillable = [
        'user_id',
        'nama',
        'nomor_punggung',
        'tanggal_lahir',
        'posisi_bermain',
        'alamat',
        'nomor_wa',
        'nomor_wa_ortu',
        'foto',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
