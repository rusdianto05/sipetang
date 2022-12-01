<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class KetJamKesos extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'ket_jamkesos';

    protected $fillable = [
        'user_id',
        'surat_id',
        'jamkesos_id',
        'keperluan',
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
