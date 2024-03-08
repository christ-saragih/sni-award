<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StatusKepemilikan extends Model
{
    use HasFactory;

    protected $table = 'status_kepemilikan';

    protected $guarded = [];

    // public function assessment_sub_kategori(): HasMany
    // {
    //     return $this->hasMany(AssessmentSubKategori::class);
    // }
}
