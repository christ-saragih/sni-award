<?php

namespace App\Models;

use App\Traits\CreatedUpdatedBy;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class KategoriBerita extends Model
{
    use HasFactory;
    use SoftDeletes, CreatedUpdatedBy;

    protected $fillable = ['nama'];
    protected $guarded = [];
    protected $table = 'kategori_berita';

    public function berita() : HasMany
    {
        return $this->hasMany(Berita::class, 'kategori_berita_id', 'id');
    }
}
