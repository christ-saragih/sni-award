<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class PesertaKontak extends Model
{
    use HasFactory;

    protected $guarded = [];
    protected $table = 'peserta_kontak';

    public function peserta() : BelongsTo {
        return $this->belongsTo(Peserta::class, 'peserta_id');
    }
    
}
