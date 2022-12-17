<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Perijinan extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'perijinan';

    protected $fillable = [
        'user_id',
        'surat_id',
        'kepala_keluarga',
        'tujuan',
        'place',
        'valid_from',
        'valid_until',
        'time',
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
