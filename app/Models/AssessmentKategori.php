<?php

namespace App\Models;

use App\Traits\CreatedUpdatedBy;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class AssessmentKategori extends Model
{
    use HasFactory, CreatedUpdatedBy;

    protected $table = 'assessment_kategori';

    // protected $fillable = [
    //     'nama',
    // ];

    protected $guarded = [];

    public function assessment_sub_kategori(): HasMany
    {
        return $this->hasMany(AssessmentSubKategori::class);
    }
    
}
