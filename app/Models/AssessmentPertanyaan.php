<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class AssessmentPertanyaan extends Model
{
    use HasFactory;

    protected $guarded = [];
    protected $table = 'assessment_pertanyaan';

    public function assessment_sub_kategori() : BelongsTo
    {
        return $this->belongsTo(AssessmentSubKategori::class, 'assessment_sub_kategori_id', 'id');
    }

    public function assessment_jawaban() : HasMany
    {
        return $this->hasMany(AssessmentJawaban::class, 'assessment_pertanyaan_id', 'id');
    }
}
