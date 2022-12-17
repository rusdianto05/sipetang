<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class KetPindahPenduduk extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'ket_pindah_penduduk';

    protected $fillable = [
        'name_id',
        'pindah_id',
        'ktp_expired',
        'shdk',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'name_id', 'id');
    }

    public function pindah()
    {
        return $this->belongsTo(KetPindah::class, 'pindah_id', 'id');
    }
}
