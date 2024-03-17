<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class KategoriOrganisasi extends Model
{
    use HasFactory;

    protected $guarded = [];
    protected $table = 'kategori_organisasi';

    public function tipe_kategori() : BelongsTo
    {
        return $this->belongsTo(TipeKategori::class, 'tipe_kategori_id', 'id');
    }
}
