<?php

namespace App\Models;

use App\AuditableTrait;
use Illuminate\Contracts\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ItemsCategory extends Model
{
    /** @use HasFactory<\Database\Factories\ItemsCategoryFactory> */
    use AuditableTrait,HasFactory,SoftDeletes;

    protected $fillable = ['name', 'description'];

    protected function name(): Attribute
    {
        return Attribute::make(
            get: fn ($name) => str()->title($name),
        );
    }

    public function items()
    {
        return $this->hasMany(Item::class);
    }

    public function scopeNotEmptyWithCategory(Builder $query): Builder
    {
        return $query->whereHas('items');
    }
}
