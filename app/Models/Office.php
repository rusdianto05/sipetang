<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Office extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'office';

    protected $guarded = ['id'];


    public function camat()
    {
        return $this->belongsTo(User::class, 'camat_id');
    }

    public function kades()
    {
        return $this->belongsTo(User::class, 'kepala_desa_id');
    }

    public function pamong()
    {
        return $this->belongsTo(User::class, 'pamong_id');
    }

    public function ketuaadat()
    {
        return $this->belongsTo(User::class, 'ketua_adat_id');
    }
}
