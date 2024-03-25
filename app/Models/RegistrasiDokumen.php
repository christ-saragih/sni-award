<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class RegistrasiDokumen extends Model
{
    use HasFactory;

    protected $table = 'registrasi_dokumen';
    // protected $fillable = ['url_dokumen'];
    protected $guarded = [];

    public function dokumen(): BelongsTo
    {
        return $this->belongsTo(Dokumen::class);
    }

    public function Registrasi(): BelongsTo
    {
        return $this->belongsTo(Registrasi::class);
    }
}