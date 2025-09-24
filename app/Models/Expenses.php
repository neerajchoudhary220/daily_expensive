<?php

namespace App\Models;

use App\AuditableTrait;
use Illuminate\Contracts\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Carbon;

class Expenses extends Model
{
    /** @use HasFactory<\Database\Factories\ExpensesFactory> */
    use AuditableTrait,HasFactory;

    protected $fillable = ['expense_category_id', 'name', 'amount', 'description', 'expense_date',
        'payment_mode'];

    // protected function paymentMode(): Attribute
    // {
    //     return Attribute::make(get: fn (string $payment_mode) => ucfirst($payment_mode));
    // }

    public function expenseCategory(): BelongsTo
    {
        return $this->belongsTo(ExpenseCategory::class);
    }

    public function scopeForCategory(Builder $query, $category_id): Builder
    {
        if ($category_id == 0) {
            return $query;
        }

        return $query->whereHas('expenseCategory', function ($q) use ($category_id) {

            $q->where('id', $category_id);
        });
    }

    public function scopeForToday(Builder $query): Builder
    {
        $today = Carbon::now()->format('Y-m-d');

        return $query->whereDate('expense_date', $today);

    }

    public function scopeForYesterDay(Builder $query): Builder
    {
        return $query->whereDate('expense_date', Carbon::yesterday());
    }

    public function scopeForMonth(Builder $query): Builder
    {
        $currentMonth = Carbon::now()->month;

        return $query->whereMonth('expense_date', $currentMonth);
    }

    public function scopeForWeek(Builder $query): Builder
    {
        return $query->whereBetween('expense_date', [
            Carbon::now()->startOfWeek(),
            Carbon::now()->endOfWeek(),
        ]);
    }

    public function scopeForDate(Builder $query, string $start_date, string $end_date): Builder
    {
        return $query->whereBetween('expense_date', [$start_date, $end_date]);
    }

    public function scopeForPaymentMethod(Builder $query, string $payment_type): Builder
    {
        if ($payment_type === 'all') {
            return $query;
        }

        return $query->where('payment_mode', $payment_type);
    }

    public function scopeForAllCategory(Builder $query): Builder
    {
        return $query->wherehas('expenseCategory');
    }
}
