<?php

namespace App\Models;

use App\Traits\CreatedUpdatedBy;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class AssessmentSubKategori extends Model
{
    use HasFactory;
    use SoftDeletes, CreatedUpdatedBy;

    protected $table = 'assessment_sub_kategori';
    protected $guarded = [];

    public function assessment_kategori(): BelongsTo
    {
        return $this->belongsTo(AssessmentKategori::class);
    }

    public function assessment_pertanyaan(): HasMany
    {
        return $this->hasMany(AssessmentPertanyaan::class);
    }

    public static function boot()
    {
        parent::boot();

        static::deleted(function ($model) {
            $model->assessment_pertanyaan->each(function ($item) {
                $item->delete();
            });
        });
    }
}
