<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class MohonCerai extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'mohon_cerai';

    protected $fillable = [
        'suami_id',
        'istri_id',
        'surat_id',
        'sebab',
        'status'
    ];

    public function suami()
    {
        return $this->belongsTo(User::class, 'suami_id');
    }

    public function istri()
    {
        return $this->belongsTo(User::class, 'istri_id');
    }

    public function surat()
    {
        return $this->belongsTo(Surat::class, 'surat_id');
    }
}
