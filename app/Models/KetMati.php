<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class KetMati extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'ket_mati';

    protected $fillable = [
        'id',
        'user_id',
        'surat_id',
        'pelapor_id',
        'pelapor_hubungan',
        'sebab',
        'place',
        'waktu',
        'status'

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
