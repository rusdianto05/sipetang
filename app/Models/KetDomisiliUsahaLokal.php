<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class KetDomisiliUsahaLokal extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'ket_domisili_usaha_lokal';
    protected $fillable = [
        'user_id',
        'surat_id',
        'name',
        'jenis',
        'alamat',
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
}
