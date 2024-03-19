<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Registrasi extends Model
{
    use HasFactory;

    protected $table = 'registrasi';

    public function peserta(): BelongsTo
    {
        return $this->belongsTo(Peserta::class);
    }

    public function registrasi_assessment(): HasMany
    {
        return $this->hasMany(RegistrasiAssessment::class);
    }

    public function registrasi_dokumen(): HasMany
    {
        return $this->hasMany(RegistrasiDokumen::class);
    }

    public function status(): BelongsTo
    {
        return $this->belongsTo(Status::class);
    }
}