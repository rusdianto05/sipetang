<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class KetJalan extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'keterangan_jalan';

    protected $fillable = [
        'user_id',
        'surat_id',
        'kepala_keluarga',
        'keperluan',
        'status',
        'valid_from',
        'valid_until',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function surat()
    {
        return $this->belongsTo(Surat::class);
    }
}
