<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class KetNikah extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'ket_nikah';

    protected $fillable = [
        'user_id',
        'ayah_id',
        'ibu_id',
        'surat_id',
        'pasangan_id',
        'ayah_pasangan_id',
        'ibu_pasangan_id',
        'wali_id',
        'pasangan_dulu_id',
        'place',
        'mas_kawin',
        'time',
        'status',
    ];


    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function ayah()
    {
        return $this->belongsTo(User::class);
    }
    public function ibu()
    {
        return $this->belongsTo(User::class);
    }



    public function pasangan()
    {
        return $this->belongsTo(User::class, 'pasangan_id');
    }
    public function ayah_pasangan()
    {
        return $this->belongsTo(User::class, 'pasangan_id');
    }
    public function ibu_pasangan()
    {
        return $this->belongsTo(User::class, 'pasangan_id');
    }

    public function wali()
    {
        return $this->belongsTo(User::class, 'wali_id');
    }

    public function pasangan_dulu()
    {
        return $this->belongsTo(User::class, 'pasangan_dulu_id');
    }

    public function surat()
    {
        return $this->belongsTo(Surat::class);
    }
}
