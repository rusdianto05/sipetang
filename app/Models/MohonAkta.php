<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class MohonAkta extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'mohon_akta';

    protected $fillable = [
        'user_id',
        'ayah_id',
        'ibu_id',
        'surat_id',
        'hari_lahir',
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

    public function surat()
    {
        return $this->belongsTo(Surat::class);
    }
}
