<?php

namespace App\Models;

use App\Traits\CreatedUpdatedBy;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\SoftDeletes;

class Dokumen extends Model
{
    use HasFactory;
    use SoftDeletes, CreatedUpdatedBy;

    protected $table = 'dokumen';
    protected $guarded = [];

    public function registrasi_dokumen() : HasOne {
        return $this->hasOne(RegistrasiDokumen::class);
    }
}
