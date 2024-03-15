<?php

namespace App\Models;

use App\Traits\CreatedUpdatedBy;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Berita extends Model
{
    use SoftDeletes, CreatedUpdatedBy;

    protected $guarded = [];
    protected $table ='berita';

    public function tag_berita() : BelongsToMany
    {
        return $this->belongsToMany(TagBerita::class, 'berita_tag', 'berita_id', 'tag_id');
    }
}
