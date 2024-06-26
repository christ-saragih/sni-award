<?php

namespace App\Models;

use App\Traits\CreatedUpdatedBy;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class RegistrasiDokumen extends Model
{
    use HasFactory, SoftDeletes, CreatedUpdatedBy;

    protected $table = 'registrasi_dokumen';
    // protected $fillable = ['url_dokumen'];
    protected $guarded = [];

    public function dokumen(): BelongsTo
    {
        return $this->belongsTo(Dokumen::class);
    }

    public function registrasi(): BelongsTo
    {
        return $this->belongsTo(Registrasi::class);
    }
}
