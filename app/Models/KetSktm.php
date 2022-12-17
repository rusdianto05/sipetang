<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class KetSktm extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'ket_sktm';

    protected $fillable = [
        'user_id',
        'surat_id',
        'anak_id',
        'tujuan',
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

    public function anak()
    {
        return $this->belongsTo(User::class);
    }
}
