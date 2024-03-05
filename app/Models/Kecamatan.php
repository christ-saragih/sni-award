<?php

namespace App\Models;

use App\Traits\CreatedUpdatedBy;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class Kecamatan extends Model
{
    use HasFactory;
    use SoftDeletes;
    // use CreatedUpdatedBy;

    protected $table = 'kecamatan';

    protected $guarded = ['id'];

    public function kota(): BelongsTo 
    {
        return $this->belongsTo(Kota::class);
    } 
}
