<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Expenses extends Model
{
    /** @use HasFactory<\Database\Factories\ExpensesFactory> */
    use HasFactory;

    protected $fillable = ['name', 'date', 'price', 'description'];

    public function users(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function expenseCategory(): BelongsTo
    {
        return $this->belongsTo(ExpensesCategory::class);
    }
}
