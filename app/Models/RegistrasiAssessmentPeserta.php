<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class RegistrasiAssessmentPeserta extends Model
{
    use HasFactory;

    protected $table = 'registrasi_assessment_peserta'; 

    public function pendaftaran_peserta(): BelongsTo
    {
        return $this->belongsTo(PendaftaranPeserta::class);
    }
    
    public function assessment_pertanyaan(): BelongsTo
    {
        return $this->belongsTo(AssessmentPertanyaan::class);
    }

    public function assessment_jawaban(): BelongsTo
    {
        return $this->belongsTo(AssessmentJawaban::class);
    }
}