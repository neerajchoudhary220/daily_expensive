<?php

namespace App\Livewire\IncomeSource;

use App\Models\IncomeSourceCategory;
use Illuminate\Support\Carbon;
use Livewire\Attributes\On;
use Livewire\Component;

class AddEditIncomeSource extends Component
{
    public $incomes = null;

    public $amount = '';

    public $date = '';

    public $description = '';

    public $source_category = '';

    public $source_categories = null;

    #[On('add-income-source-event')]
    public function handleShowIncomeSource()
    {
        $this->date = Carbon::now()->format('Y-m-d');
        $this->source_categories = IncomeSourceCategory::get();
        $this->dispatch('show-income-transaction-modal');
    }

    public function render()
    {
        return view('livewire.income-source.add-edit-income-source');
    }
}
