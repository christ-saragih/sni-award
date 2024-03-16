<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class TipeKategori extends Model
{
    use HasFactory;

    protected $guarded = [];
    protected $table = 'tipe_kategori';

    public function kategori_organisasi() : HasMany
    {
        return $this->hasMany(KategoriOrganisasi::class, 'tipe_kategori', 'id');
    }
}
