<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class AssessmentSubKategori extends Model
{
    use HasFactory;

    protected $table = 'assessment_sub_kategori';

    // protected $fillable = [
    //     'assessment_kategori_id',
    //     'nama',
    // ];

    protected $guarded = [];
    
    public function assessment_kategori(): BelongsTo   
    {
        return $this->belongsTo(AssessmentKategori::class);
    }
}
