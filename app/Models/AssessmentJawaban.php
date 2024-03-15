<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class AssessmentJawaban extends Model
{
    use HasFactory;

    protected $guarded = [];
    protected $table = 'assessment_jawaban';

    public function assessment_pertanyaan() : BelongsTo
    {
        return $this->belongsTo(AssessmentPertanyaan::class, 'assessment_pertanyaan_id', 'id');
    }

}
