<?php

namespace App;

use App\Models\User;

trait AuditableTrait
{
    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            if (auth()->check()) { // check if user is logged in
                $model->user_id = auth()->id(); // safer than auth()->user()->id
            }
        });
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
