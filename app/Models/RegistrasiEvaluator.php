<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class RegistrasiEvaluator extends Model
{
    use HasFactory;

    protected $table = 'registrasi_evaluator';
    protected $guarded = [];

    public function registrasi(): BelongsTo {
        return $this->belongsTo(Registrasi::class);
    }

    public function evaluator(): BelongsTo {
        return $this->belongsTo(User::class);
    }
    
    public function lead_evaluator(): BelongsTo {
        return $this->belongsTo(User::class);
    }
}
