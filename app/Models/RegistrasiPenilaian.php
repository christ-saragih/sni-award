<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class RegistrasiPenilaian extends Model
{
    use HasFactory;

    protected $table = 'registrasi_penilaian';
    protected $guarded = [''];

    public function registrasi(): BelongsTo
    {
        return $this->belongsTo(Registrasi::class);
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'internal_id', 'id');
    }
}
