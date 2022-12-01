<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class KetKtp extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'ket_ktp';

    protected $fillable = [
        'user_id',
        'surat_id',
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
