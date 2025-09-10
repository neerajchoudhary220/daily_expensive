<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ExpensesCategory extends Model
{
    /** @use HasFactory<\Database\Factories\ExpensesCategoryFactory> */
    use HasFactory,SoftDeletes;

    protected $fillable = ['name', 'description'];

    public function user()
    {
        $this->belongsTo(User::class);
    }

    protected function name(): Attribute
    {
        return Attribute::make(
            get: fn ($name) => str()->title($name)
        );
    }
}
