<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class AssessmentSubKategori extends Model
{
    use HasFactory;

    protected $guarded = [];
    protected $table = 'assessment_sub_kategori';

    public function assessment_kategori() : BelongsTo
    {
        return $this->belongsTo(AssessmentKategori::class, 'assessment_kategori_id', 'id');
    }

    public function assessment_pertanyaan() : HasMany
    {
        return $this->hasMany(AssessmentPertanyaan::class, 'assessment_sub_kategori_id', 'id');
    }

}
