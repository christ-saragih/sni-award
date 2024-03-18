<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class RegistrasiDokumenPeserta extends Model
{
    use HasFactory;

    protected $table = 'registrasi_dokumen_peserta';

    public function dokumen(): BelongsTo
    {
        return $this->belongsTo(Dokumen::class);
    }

    public function pendaftaran_peserta(): BelongsTo
    {
        return $this->belongsTo(PendaftaranPeserta::class);
    }
}