<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class RegistrasiAssessment extends Model
{
    use HasFactory;

    protected $table = 'registrasi_assessment'; 

    protected $fillable = [
        'registrasi_id',
        'assessment_pertanyaan_id',
        'assessment_jawaban_id',
    ];

    public function registrasi(): BelongsTo
    {
        return $this->belongsTo(Registrasi::class);
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