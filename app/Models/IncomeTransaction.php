<?php

namespace App\Models;

use App\AuditableTrait;
use Illuminate\Contracts\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Carbon;

class IncomeTransaction extends Model
{
    /** @use HasFactory<\Database\Factories\IncomeTransactionFactory> */
    use AuditableTrait,HasFactory;

    protected $fillable = ['amount', 'description', 'income_source_category_id', 'date'];

    /**
     * Get the user associated with the IncomeTransaction
     */
    public function incomeSourceCategory(): BelongsTo
    {
        return $this->belongsTo(IncomeSourceCategory::class);
    }

    public function scopeForCategory(Builder $query, $category_id): Builder
    {
        if ($category_id == 0) {
            return $query;
        }

        return $query->whereHas('incomeSourceCategory', function ($q) use ($category_id) {

            $q->where('id', $category_id);
        });
    }

    public function scopeForToday(Builder $query): Builder
    {
        $today = Carbon::now()->format('Y-m-d');

        return $query->whereDate('date', $today);

    }

    public function scopeForYesterDay(Builder $query): Builder
    {
        return $query->whereDate('date', Carbon::yesterday());
    }

    public function scopeForMonth(Builder $query): Builder
    {
        $currentMonth = Carbon::now()->month;

        return $query->whereMonth('date', $currentMonth);
    }

    public function scopeForWeek(Builder $query): Builder
    {
        return $query->whereBetween('date', [
            Carbon::now()->startOfWeek(),
            Carbon::now()->endOfWeek(),
        ]);
    }

    public function scopeForDate(Builder $query, string $start_date, string $end_date): Builder
    {
        return $query->whereBetween('date', [$start_date, $end_date]);
    }
}
