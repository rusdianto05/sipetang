<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class MohonRubahKk extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'mohon_rubah_kk';

    protected $fillable = [
        'user_id',
        'surat_id',
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
