<?php

namespace App\Models;

use App\Traits\CreatedUpdatedBy;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class TagBerita extends Model
{
    use HasFactory;
    use SoftDeletes, CreatedUpdatedBy;

    protected $fillable = ['nama'];
    protected $guarded = [];
    protected $table = 'tag_berita';

    public function berita()
    {
        return $this->belongsToMany(Berita::class, 'berita_tag', 'tag_id', 'berita_id');
    }

    public function berita_tag() : HasMany {
        return $this->hasMany(BeritaTag::class, 'tag_id', 'id');
    }

}
