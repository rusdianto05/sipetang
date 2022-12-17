<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KeteranganBedaNama extends Model
{
    use HasFactory;

    protected $table = 'ket_beda_nama';
    protected $fillable = [
        'user_id',
        'surat_id',
        'new_name',
        'perbedaan',
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
