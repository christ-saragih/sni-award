<?php

namespace App\Models;

use App\Traits\CreatedUpdatedBy;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Dokumen extends Model
{
    use HasFactory;
    use SoftDeletes, CreatedUpdatedBy;

    protected $table = 'dokumen';
    // protected $fillable = ['nama', 'status'];
    protected $guarded = [];
}
