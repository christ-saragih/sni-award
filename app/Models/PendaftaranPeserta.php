<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class PendaftaranPeserta extends Model
{
    use HasFactory;

    protected $table = 'pendaftaran_peserta';

    public function peserta(): BelongsTo
    {
        return $this->belongsTo(Peserta::class);
    }

    public function registrasi_assessment_peserta(): HasMany
    {
        return $this->hasMany(RegistrasiAssessmentPeserta::class);
    }

    public function registrasi_dokumen_peserta(): HasMany
    {
        return $this->hasMany(RegistrasiDokumenPeserta::class);
    }

    public function status(): BelongsTo
    {
        return $this->belongsTo(Status::class);
    }
}