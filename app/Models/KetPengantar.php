<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class KetPengantar extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'ket_pengantar';

    protected $fillable = [
        'user_id',
        'surat_id',
        'kepala_keluarga',
        'keperluan',
        'status',
        'valid_until',
        'valid_from',
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
