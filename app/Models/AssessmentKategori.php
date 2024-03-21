<?php

namespace App\Models;

use App\Traits\CreatedUpdatedBy;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\SoftDeletes;

class AssessmentKategori extends Model
{
    use HasFactory;
    use SoftDeletes, CreatedUpdatedBy;

    protected $table = 'assessment_kategori';
    protected $guarded = [];

    public function assessment_sub_kategori(): HasMany
    {
        return $this->hasMany(AssessmentSubKategori::class);
    }

    public static function boot()
    {
        parent::boot();

        static::deleted(function ($model) {
            $model->assessment_sub_kategori->each(function ($item) {
                $item->delete();
            });
        });
    }
}
