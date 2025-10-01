<?php

namespace App\Livewire\Expenses;

use App\Models\ExpenseCategory;
use App\Models\Expenses;
use Illuminate\Support\Carbon;
use Livewire\Attributes\On;
use Livewire\Component;

class AddEditExpense extends Component
{
    public $expense_categories = null;

    public $expense_category_id = null;

    public $description = '';

    public $amount = 0;

    public $name = '';

    public $expense_date = null;

    public $expense = null;

    public string $payment_mode = 'Cash';

    protected $rules = [
        'name' => ['required', 'min:3', 'max:200'],
        'expense_category_id' => ['required', 'exists:expense_categories,id'],
        'amount' => ['required', 'regex:/^\d+(\.\d{1,2})?$/'],
        'expense_date' => ['required'],
        'payment_mode' => ['required', 'in:online,cash'],
        'description' => ['nullable', 'min:3', 'max:500'],
    ];

    protected function resetError()
    {
        $this->name = $this->description = $this->expense_category_id = $this->amount = $this->expense_date = $this->payment_mode = '';
        $this->resetErrorBag(['name', 'description']);

    }

    #[On('show-add-expense-model-event')]
    public function handleShowExpenseModel()
    {
        $this->resetError();
        $this->expense_categories = ExpenseCategory::get();
        $this->expense_category_id = $this->expense_categories->first()->id;
        $this->expense_date = Carbon::now()->format('Y-m-d');

        $this->dispatch('show-expense-modal');

    }

    #[On('edit-expense-event')]
    public function editExpense(Expenses $expense)
    {
        $this->resetError();
        $this->expense = $expense;
        $this->name = $expense->name;
        $this->expense_categories = ExpenseCategory::get();
        $this->expense_category_id = $expense->expense_category_id;
        $this->amount = $expense->amount;
        $this->description = $expense->description;
        $this->expense_date = $expense->expense_date;
        $this->payment_mode = $expense->payment_mode;
        $this->dispatch('show-expense-modal');

    }

    public function save()
    {
        $input_expenses = $this->validate($this->rules);
        Expenses::create($input_expenses);
        session()->flash('message', 'New Expenses Add Successfully');

        return redirect(request()->header('Referer'));
    }

    public function update()
    {
        $input_expenses = $this->validate($this->rules);
        $this->expense->update($input_expenses);
        session()->flash('message', 'Expenses Updated Successfully');

        return redirect(request()->header('Referer'));

    }

    public function render()
    {
        return view('livewire.expenses.add-edit-expense');
    }
}
