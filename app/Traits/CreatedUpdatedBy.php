<?php

namespace App\Traits;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Auth;

trait CreatedUpdatedBy
{
    use SoftDeletes;
    public static function bootCreatedUpdatedBy()
    {
        // updating created_by and updated_by when model is created
        static::creating(function ($model) {
            if (Auth::guard('web')->check()) {
                $model->role_by = 'User';
            } elseif (Auth::guard('peserta')->check()) {
                $model->role_by = 'Peserta';
            } else {
                $model->role_by = null;
            }
            
            if (!$model->isDirty('created_by')) {
                $model->created_by = auth()->user()->id;
            }
            if (!$model->isDirty('updated_by')) {
                $model->updated_by = auth()->user()->id;
            }
        });

        // updating updated_by when model is updated
        static::updating(function ($model) {
            if (Auth::guard('web')->check()) {
                $model->role_by = 'User';
            } elseif (Auth::guard('peserta')->check()) {
                $model->role_by = 'Peserta';
            } else {
                $model->role_by = null;
            }

            if (!$model->isDirty('updated_by')) {
                $model->updated_by = auth()->user()->id;
            }
        });

        static::deleting(function ($model) {
            if (Auth::guard('web')->check()) {
                $model->role_by = 'User';
            } elseif (Auth::guard('peserta')->check()) {
                $model->role_by = 'Peserta';
            } else {
                $model->role_by = null;
            }

            if (!$model->isDirty('deleted_by')) {
                $model->deleted_by = auth()->user()->id;
                $model->save();
            }
        });
        static::restoring(function ($model) {
            if (Auth::guard('web')->check()) {
                $model->role_by = 'User';
            } elseif (Auth::guard('peserta')->check()) {
                $model->role_by = 'Peserta';
            } else {
                $model->role_by = null;
            }

            if (!$model->isDirty('deleted_by')) {
                $model->deleted_by = auth()->user()->id;
            }
        });
        parent::bootSoftDeletes();
    }
}
