<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TagBerita extends Model
{
    use HasFactory;

    protected $fillable = ['nama'];
    protected $guarded = [];
    protected $table = 'tag_berita';

    public function berita()
    {
        return $this->belongsToMany(Berita::class, 'berita_tag', 'tag_id', 'berita_id');
    }

}
