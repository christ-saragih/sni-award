<?php

namespace App\Models;

use App\Traits\CreatedUpdatedBy;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class Kota extends Model
{
    use HasFactory;
    use SoftDeletes;
    // use CreatedUpdatedBy;

    protected $table = 'kota';

    protected $guarded = ['id'];

    public function propinsi(): BelongsTo
    {
        return $this->belongsTo(Provinsi::class);
    }
}
