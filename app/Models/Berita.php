<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Berita extends Model
{
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
