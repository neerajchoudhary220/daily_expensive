<?php

namespace App\Livewire\Expenses;

use App\Models\Expenses;
use Illuminate\Support\Carbon;
use Livewire\Attributes\On;
use Livewire\Component;

class TotalExpense extends Component
{
    public $total_expense = '';

    public $today_expense = '';

    public function mount()
    {
        $currentMonth = Carbon::now()->month;
        $currentYear = Carbon::now()->year;
        $this->today_expense = Expenses::forToday()->sum('amount');
        $this->total_expense = Expenses::forMonth('expense_date', $currentMonth)
            ->whereYear('expense_date', $currentYear)
            ->sum('amount');
    }

    #[On('expense-filter-event')]
    public function filter(string $category, string $quick_day, string $payment_method, ?string $start_date = null, ?string $end_date = null)
    {
        $this->total_expense = Expenses::forCategory($category)->forPaymentMethod($payment_method)
            ->when($quick_day === 'today', fn ($expense) => $expense->forToday($quick_day))
            ->when($quick_day === 'yesterday', fn ($expense) => $expense->forYesterDay($quick_day))
            ->when($quick_day === 'week', fn ($expense) => $expense->forWeek($quick_day))
            ->when($quick_day === 'month', fn ($expense) => $expense->forMonth($quick_day))
            ->when($start_date && $end_date, fn ($expense) => $expense->forDate($start_date, $end_date))
            ->sum('amount');
        $this->today_expense = Expenses::forCategory($category)
            ->forPaymentMethod($payment_method)->forToday()->sum('amount');

    }

    public function render()
    {
        return view('livewire.expenses.total-expense');
    }
}
