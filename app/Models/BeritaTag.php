<?php

namespace App\Models;

use App\Traits\CreatedUpdatedBy;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class BeritaTag extends Model
{
    use HasFactory;
    use SoftDeletes, CreatedUpdatedBy;

    protected $guarded = [];
    protected $table ='berita_tag';
}
