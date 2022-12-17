<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory,  Notifiable, HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'person_id',
        'family_id',
        'name',
        'email',
        'password',
        'phone',
        'religion',
        'gender',
        'citizenship',
        'address',
        'blood_group',
        'married_status',
        'job',
        'last_education',
        'place_of_birth',
        'date_of_birth',
        'photo',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function beda_nama()
    {
        return $this->hasMany(KeteranganBedaNama::class);
    }
    public function domisili_usaha_luar()
    {
        return $this->hasMany(KetDomisiliUsahaLuar::class);
    }
    public function ket_ktp()
    {
        return $this->hasMany(KetKtp::class);
    }
    public function mati()
    {
        return $this->hasMany(KetMati::class);
    }
}
