<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Foundation\Auth\User as Authenticatable;
// use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Peserta extends Authenticatable
{
    use HasFactory, HasApiTokens, Notifiable;
    protected $table = 'Peserta';
    protected $fillable = [
        'nama',
        'email',
        'password',
        'kategori_organisasi_id',
        'verify_key',
        'forgot_password_token',
        'email_verified_at',
        'verified_by',
        'verified_at',
        'role_by',
    ];
    protected $hidden = [
        'password',
        'remember_token'
    ];
    protected $cast = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed'
    ];

    public function peserta_profil() : HasOne {
        return $this->hasOne(PesertaProfil::class);
    }

    public function peserta_kontak() : HasMany {
        return $this->hasMany(PesertaKontak::class);
    }

    public function registrasi() : HasMany {
        return $this->hasMany(Registrasi::class);
    }

    public function  kategori_organisasi() : BelongsTo {
        return $this->belongsTo(KategoriOrganisasi::class);
    }

    public function status_kepemilikan() : BelongsTo {
        return $this->belongsTo(StatusKepemilikan::class);
    }
}
