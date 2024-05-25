<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Registrasi extends Model
{
    use HasFactory;

    protected $guarded = [];
    protected $table = 'registrasi';

    public function peserta(): BelongsTo
    {
        return $this->belongsTo(Peserta::class);
    }

    public function sekretariat(): BelongsTo
    {
        return $this->belongsTo(User::class, 'sekretariat_id', 'id');
    }

    public function registrasi_assessment(): HasMany
    {
        return $this->hasMany(RegistrasiAssessment::class);
    }

    public function registrasi_dokumen(): HasMany
    {
        return $this->hasMany(RegistrasiDokumen::class);
    }

    public function registrasi_evaluator(): HasOne
    {
        return $this->hasOne(RegistrasiEvaluator::class);
    }

    public function registrasi_penilaian(): HasMany
    {
        return $this->hasMany(RegistrasiPenilaian::class);
    }

    public function status(): BelongsTo
    {
        return $this->belongsTo(Status::class);
    }

    public function stage(): BelongsTo
    {
        return $this->belongsTo(Stage::class);
    }

    public function kategori_organisasi() : BelongsTo {
        return $this->belongsTo(KategoriOrganisasi::class);
    }
}
