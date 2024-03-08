<?php

namespace App\Models;

use App\Traits\CreatedUpdatedBy;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Propinsi extends Model
{
    use HasFactory;
    use SoftDeletes;
    // use CreatedUpdatedBy;

    protected $table = 'propinsi';

    protected $guarded = ['id'];

    public function kota(): HasMany
    {
        return $this->hasMany(Kota::class);
    }
}
