<?php

namespace App\Http\Traits;

use Illuminate\Support\Str;

trait HasUuidKey
{
    protected static function booted()
    {
        static::creating(function ($model) {
            if ($model->{$model->primaryKey} == null) {
                $model->{$model->primaryKey} = Str::uuid();
            }
        });
    }
}
