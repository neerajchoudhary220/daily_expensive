<?php

namespace App\Livewire;

use App\Models\ExpenseCategory;
use App\Models\Expenses;
use Illuminate\Support\Carbon;
use Livewire\Attributes\On;
use Livewire\Component;

class DashboardExpense extends Component
{
    public $total_expense = 0;

    public $total_food_and_groceries = 0;

    public $total_transport = 0;

    public $total_utilities = 0;

    public $total_healthcare = 0;

    public $total_education = 0;

    public $total_entertainment = 0;

    public $total_shopping = 0;

    public $total_other = 0;

    protected function totalExpense($expense_query, $category_id)
    {
        return $expense_query->clone()->forCategory($category_id)->sum('amount');
    }

    #[On('expense-filter-event')]
    public function loadDataHandler(?string $quick_day = null, ?string $payment_method = null, ?string $start_date = null, ?string $end_date = null)
    {
        $currentMonth = Carbon::now()->month;
        $currentYear = Carbon::now()->year;
        $expense_query = Expenses::forMonth('expense_date', $currentMonth)
            ->whereYear('expense_date', $currentYear)
            ->when($payment_method, fn ($expense) => $expense->forPaymentMethod($payment_method))
            ->when($quick_day === 'today', fn ($expense) => $expense->forToday($quick_day))
            ->when($quick_day === 'yesterday', fn ($expense) => $expense->forYesterDay($quick_day))
            ->when($quick_day === 'week', fn ($expense) => $expense->forWeek($quick_day))
            ->when($quick_day === 'month', fn ($expense) => $expense->forMonth($quick_day))
            ->when($start_date && $end_date, fn ($expense) => $expense->forDate($start_date, $end_date));

        $expense_categories = ExpenseCategory::get();
        $categoryMap = [
            'Food & Groceries' => 'total_food_and_groceries',
            'Transportation' => 'total_transport',
            'Utilities' => 'total_utilities',
            'Healthcare' => 'total_healthcare',
            'Education' => 'total_education',
            'Entertainment' => 'total_entertainment',
            'Shopping' => 'total_shopping',
            'Others' => 'total_other',
        ];

        $series = [];
        foreach ($expense_categories as $expense_category) {
            if (isset($categoryMap[$expense_category->name])) {
                $property = $categoryMap[$expense_category->name];
                $this->$property = $this->totalExpense($expense_query, $expense_category->id);
                $series = [...$series, $this->$property];
            }
        }
        $this->total_expense = $expense_query->clone()
            ->sum('amount');
        $this->dispatch('load-data', series: $series);
    }

    public function mount()
    {
        $this->loadDataHandler();
    }

    public function render()
    {
        return view('livewire.dashboard-expense');
    }
}
