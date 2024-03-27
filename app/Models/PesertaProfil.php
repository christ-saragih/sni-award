<?php

namespace App\Models;

use App\Traits\CreatedUpdatedBy;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\SoftDeletes;

class PesertaProfil extends Model
{
    use HasFactory, SoftDeletes, CreatedUpdatedBy;
    protected $table = 'peserta_profil';
    protected $guarded = [];

    public function status_kepemilikan(): BelongsTo {
        return $this->belongsTo(StatusKepemilikan::class);
    }
    public function lembaga_sertifikasi(): BelongsTo {
        return $this->belongsTo(LembagaSertifikasi::class);
    }
    public function kategori_organisasi(): BelongsTo {
        return $this->belongsTo(KategoriOrganisasi::class,'sektor_kategori_organisasi_id');
    }
    
}
