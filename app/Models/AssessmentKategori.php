<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class AssessmentKategori extends Model
{
    use HasFactory;

    protected $guarded = [];
    protected $table = 'assessment_kategori';

    public function assessment_sub_kategori() : HasMany
    {
        return $this->hasMany(AssessmentSubKategori::class, 'assessment_kategori_id', 'id');
    }
}
