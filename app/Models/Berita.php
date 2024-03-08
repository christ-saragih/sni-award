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
    // protected $fillable = ['judul_berita', 'deskripsi','tanggal','file'];
    protected $guarded = [];
    protected $table ='berita';

    public function kategori_berita() : BelongsTo
    {
        return $this->belongsTo(KategoriBerita::class, 'kategori_berita_id', 'id');
    }

    public function tag_berita() : BelongsToMany
    {
        return $this->belongsToMany(TagBerita::class, 'berita_tag', 'berita_id', 'tag_id');
    }
}


// <?php

// namespace App\Models;

// use Illuminate\Database\Eloquent\Factories\HasFactory;
// use Illuminate\Database\Eloquent\Model;
// use Illuminate\Database\Eloquent\Relations\HasMany;

// class KategoriBerita extends Model
// {
//     // protected $fillable = ['judul_berita', 'deskripsi','tanggal','file'];
//     protected $guarded = [];
//     protected $table = 'kategori_berita';

//     public function berita() : HasMany
//     {
//         return $this->hasMany(Berita::class, 'kategori_berita_id', 'id');
//     }
// }
