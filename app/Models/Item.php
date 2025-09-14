<?php

namespace App\Models;

use App\AuditableTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    /** @use HasFactory<\Database\Factories\ItemFactory> */
    use AuditableTrait,HasFactory;

    protected $fillable = ['name', 'description', 'total', 'items_category_id', 'user_id'];

    public function itemsCategory()
    {
        return $this->belongsTo(ItemsCategory::class);
    }
}
