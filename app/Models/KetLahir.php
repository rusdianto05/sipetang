<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class KetLahir extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'ket_lahir';

    protected $fillable = [
        'id',
        'user_id',
        'surat_id',
        'kondisi',
        'lama_kandungan',
        'pelapor_id',
        'pelapor_hubungan',
        'tanggal_lahir',
        'tempat_lahir',
        'status',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function surat()
    {
        return $this->belongsTo(Surat::class);
    }


    public function pelapor()
    {
        return $this->belongsTo(User::class);
    }
}
