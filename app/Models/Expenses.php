<?php

namespace App\Models;

use App\AuditableTrait;
use Illuminate\Contracts\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Expenses extends Model
{
    /** @use HasFactory<\Database\Factories\ExpensesFactory> */
    use AuditableTrait,HasFactory;

    protected $fillable = ['expense_category_id', 'name', 'amount', 'description', 'expense_date',
        'payment_mode'];

    public function expenseCategory(): BelongsTo
    {
        return $this->belongsTo(ExpenseCategory::class);
    }

    public function scopeForCategory(Builder $query, $category_id): Builder
    {
        if ($category_id == 0) {
            logger()->info($category_id);

            return $query;
        }

        return $query->whereHas('expenseCategory', function ($q) use ($category_id) {
            $q->where('id', $category_id);
        });
    }

    public function scopeForAllCategory(Builder $query): Builder
    {
        return $query->wherehas('expenseCategory');
    }
}
