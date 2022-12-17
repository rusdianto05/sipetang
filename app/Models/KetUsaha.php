<?php

namespace App\Models;

use App\Http\Controllers\DomisiliUsahaLokal;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class KetUsaha extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'ket_usaha';

    protected $fillable = [
        'user_id',
        'domisili_usaha_lokal_id',
        'keterangan',
        'valid_from',
        'valid_until',
        'status',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function domisili_usaha_lokal()
    {
        return $this->belongsTo(KetDomisiliUsahaLokal::class);
    }
}
