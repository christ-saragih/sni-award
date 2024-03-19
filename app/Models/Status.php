<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Status extends Model
{
    use HasFactory;

    protected $table = 'status';

    public function pendaftaran_peserta(): HasMany
    {
        return $this->hasMany(PendaftaranPeserta::class);
    }
}