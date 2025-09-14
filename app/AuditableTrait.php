<?php

namespace App;

use App\Models\User;

trait AuditableTrait
{
    protected static function boot()
    {
        parent::boot();
        static::creating(function ($model) {
            $model->user_id = auth()->user()->id;
        });

    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
