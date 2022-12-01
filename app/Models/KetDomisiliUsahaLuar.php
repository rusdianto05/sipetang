<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class KetDomisiliUsahaLuar extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'ket_domisili_usaha_luar';

    protected $fillable = [
        'user_id',
        'surat_id',
        'jenis_identitas',
        'no_identitas',
        'name',
        'jenis',
        'register_id',
        'bangunan',
        'tujuan',
        'status_bangunan',
        'address',
        'status',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
    public function surat()
    {
        return $this->belongsTo(Surat::class, 'surat_id', 'id');
    }
}
