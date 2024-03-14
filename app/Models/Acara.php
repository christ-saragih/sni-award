<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Acara extends Model
{
    use HasFactory;

    protected $guarded = [];
    protected $table = 'acara';

    public function dokumentasi_acara() : BelongsToMany
    {
        return $this->belongsToMany(DokumentasiAcara::class, 'dokumentasi_acara', 'acara_id', 'gambar_konten');
    }
}
