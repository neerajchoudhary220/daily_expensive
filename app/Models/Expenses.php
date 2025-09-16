<?php

namespace App\Models;

use App\AuditableTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Expenses extends Model
{
    /** @use HasFactory<\Database\Factories\ExpensesFactory> */
    use AuditableTrait,HasFactory;

    protected $fillable = ['name', 'date', 'price', 'description', 'unit_id',
        'items_category_id', 'items_id', 'payment_mode'];

    public function ItemCategory(): BelongsTo
    {
        return $this->belongsTo(ItemsCategory::class);
    }
}
