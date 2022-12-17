<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class KetRujukCerai extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'ket_rujuk_cerai';

    protected $fillable = [
        'id',
        'user_id',
        'surat_id',
        'ayah_id',
        'pasangan_id',
        'pasangan_ayah_id',
        'type',
        'keterangan',
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

    public function ayah()
    {
        return $this->belongsTo(User::class, 'ayah_id', 'id');
    }

    public function pasangan()
    {
        return $this->belongsTo(User::class, 'pasangan_id', 'id');
    }

    public function pasanganayah()
    {
        return $this->belongsTo(User::class, 'pasangan_ayah_id', 'id');
    }
}
