<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class LembagaSertifikasi extends Model
{
    use HasFactory;
    protected $table = 'lembaga_sertifikasi';
    protected $guarded = [''];
}