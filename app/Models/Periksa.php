<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Periksa extends Model
{
    protected $fillable = [
        'id',
        'id_daftar_poli',
        'tgl_periksa',
        'catatan',
        'biaya_periksa',
    ];

    public function dokter()
    {
    return $this->belongsTo(User::class, 'id_dokter');
    }
    
    public function detailPeriksa()
    {
        return $this->hasMany(detailPeriksa::class, 'id_periksa', 'id');
    }
    
    public function daftarPoli()
    {
        return $this->belongsTo(DaftarPoli::class, 'id_daftar_poli', 'id');
    }
}
