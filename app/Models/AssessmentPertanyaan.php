<?php

namespace App\Models;

use App\Traits\CreatedUpdatedBy;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class AssessmentPertanyaan extends Model
{
    use HasFactory;
    use SoftDeletes, CreatedUpdatedBy;

    protected $table = 'assessment_pertanyaan';
    protected $guarded = [];

    public function assessment_sub_kategori() : BelongsTo
    {
        return $this->belongsTo(AssessmentSubKategori::class, 'assessment_sub_kategori_id', 'id');
    }

    public function assessment_jawaban() : HasMany
    {
        return $this->hasMany(AssessmentJawaban::class, 'assessment_pertanyaan_id', 'id');
    }

    public static function boot()
    {
        parent::boot();

        static::deleted(function ($model) {
            $model->assessment_jawaban->each(function ($item) {
                $item->delete();
            });
        });
    }
}
