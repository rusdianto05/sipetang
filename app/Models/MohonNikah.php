<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class MohonNikah extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'mohon_nikah';

    protected $fillable = [
        'user_id',
        'surat_id',
        'tgl_nikah',
        'kepala_keluarga',
        'nama_pasangan',
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
