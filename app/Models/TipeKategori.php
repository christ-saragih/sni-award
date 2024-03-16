<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class TipeKategori extends Model
{
    use HasFactory;
    protected $table = 'tipe_kategori';
    protected $guarded = [''];

    public function Kategori_Organisasi (): HasMany
    {
        return $this->hasMany(TipeKategori::class, 'tipe_kategori', 'id');
    }
}
