<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class KetWali extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'ket_wali';

    protected $fillable = [
        'user_id',
        'surat_id',
        'regency',
        'sub_district',
        'village',
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
