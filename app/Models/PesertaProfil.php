<?php

namespace App\Models;

use App\Traits\CreatedUpdatedBy;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\SoftDeletes;

class PesertaProfil extends Model
{
    use HasFactory, SoftDeletes, CreatedUpdatedBy;
    protected $table = 'peserta_profil';
    protected $guarded = [];

    public function status_kepemilikan(): HasOne {
        return $this->hasOne(StatusKepemilikan::class);
    }
    public function lembaga_setifikasi(): HasOne {
        return $this->hasOne(LembagaSertifikasi::class);
    }
    // public function sektor_kategori_organisasi
}
