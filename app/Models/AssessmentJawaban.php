<?php

namespace App\Models;

use App\Traits\CreatedUpdatedBy;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class AssessmentJawaban extends Model
{
    use HasFactory;
    use SoftDeletes, CreatedUpdatedBy;

    protected $table = 'assessment_jawaban';
    protected $guarded = [];

    public function assessment_pertanyaan() : BelongsTo
    {
        return $this->belongsTo(AssessmentPertanyaan::class, 'assessment_pertanyaan_id', 'id');
    }

}
