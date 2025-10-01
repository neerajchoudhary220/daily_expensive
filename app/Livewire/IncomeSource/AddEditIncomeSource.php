<?php

namespace App\Livewire\IncomeSource;

use App\Models\IncomeSourceCategory;
use App\Models\IncomeTransaction;
use Illuminate\Support\Carbon;
use Livewire\Attributes\On;
use Livewire\Component;

class AddEditIncomeSource extends Component
{
    public $incomes = null;

    public $amount = '';

    public $date = '';

    public $description = '';

    public $income_source_category_id = '';

    public $source_categories = null;

    protected $rules = [
        'amount' => ['required', 'regex:/^\d+(\.\d{1,2})?$/'],
        'income_source_category_id' => ['required', 'exists:income_source_categories,id'],
        'date' => ['required'],
        'description' => ['nullable', 'min:3', 'max:500'],
    ];

    protected function resetError()
    {
        $this->amount = $this->description = $this->source_categories = $this->amount = $this->income_source_category_id;
        $this->resetErrorBag(['name', 'description']);

    }

    #[On('add-income-source-event')]
    public function handleShowIncomeSource()
    {
        $this->resetError();
        $this->date = Carbon::now()->format('Y-m-d');
        $this->source_categories = IncomeSourceCategory::get();
        $this->income_source_category_id = $this->source_categories->first()->id;
        $this->dispatch('show-income-transaction-modal');
    }

    #[On('edit-transaction-event')]
    public function handleEditIncomeSource(IncomeTransaction $incomeTransaction)
    {
        $this->resetError();
        $this->amount = $incomeTransaction->amount;
        $this->date = $incomeTransaction->date;
        $this->description = $incomeTransaction->description;
        $this->source_categories = IncomeSourceCategory::get();
        $this->income_source_category_id = $incomeTransaction->income_source_category_id;
        $this->incomes = $incomeTransaction;
        $this->dispatch('show-income-transaction-modal');

    }

    public function save()
    {
        $inpute_transactions = $this->validate($this->rules);
        IncomeTransaction::create($inpute_transactions);
        session()->flash('message', 'New Transaction Add Successfully');

        return redirect(request()->header('Referer'));
    }

    public function update()
    {
        $inpute_transactions = $this->validate($this->rules);
        $this->incomes->update($inpute_transactions);
        session()->flash('message', 'New Transaction Updated Successfully');

        return redirect(request()->header('Referer'));

    }

    public function render()
    {
        return view('livewire.income-source.add-edit-income-source');
    }
}
