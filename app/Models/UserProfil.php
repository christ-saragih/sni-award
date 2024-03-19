<?php

namespace App\Models;

use App\Traits\CreatedUpdatedBy;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class UserProfil extends Model
{
    use HasFactory, SoftDeletes, CreatedUpdatedBy;

    protected $table = 'user_profil';
    protected $guarded = [];

    // public function user() : BelongsTo {
    //     return $this->belongsTo(User::class);
    // }
}
