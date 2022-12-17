<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class KetPindah extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'ket_pindah';

    protected $fillable = [
        'user_id',
        'surat_id',
        'status',
        'alamat_pindah',
        'alasan_pindah',
        'jumlah_pengikut',
        'tanggal_pindah',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function surat()
    {
        return $this->belongsTo(Surat::class, 'surat_id', 'id');
    }

    public function penduduk()
    {
        return $this->hasMany(KetPindahPenduduk::class, 'pindah_id', 'id');
    }
}
