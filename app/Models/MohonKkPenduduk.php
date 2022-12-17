<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class MohonKkPenduduk extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'mohon_kk_penduduk';

    protected $fillable = [
        'user_id',
        'surat_id',
        'mohon_kk_id',
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

    public function mohon_kk()
    {
        return $this->belongsTo(MohonKk::class, 'mohon_kk_id', 'id');
    }
}
