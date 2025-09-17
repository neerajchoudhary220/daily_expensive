<?php

namespace App\Livewire\Expenses;

use App\Models\Expenses;
use App\Models\Item;
use App\Models\ItemsCategory;
use App\Models\Unit;
use Livewire\Attributes\On;
use Livewire\Component;

class AddEditExpense extends Component
{
    public $item_categories = null;

    public $items = null;

    public $units = null;

    public $items_category_id = null;

    public $item_id = null;

    public $unit_id = null;

    public $description = '';

    public $price = 0;

    public $qty = 0;

    public $date = null;

    public $expense = null;

    public string $payment_mode = 'offline';

    protected $rules = [
        'item_id' => ['required', 'integer', 'exists:items,id'],
        'items_category_id' => ['required', 'exists:items_categories,id'],
        'unit_id' => ['required', 'exists:units,id'],
        'qty' => ['required', 'min:1', 'max:100'],
        'price' => ['required', 'regex:/^\d+(\.\d{1,2})?$/'],
        'date' => ['required'],
        'payment_mode' => ['required', 'in:online,offline'],
        'description' => ['nullable', 'min:3', 'max:500'],

    ];

    protected function resetError()
    {
        $this->item_id = $this->description = $this->items_category_id = $this->qty = $this->price = $this->date = $this->payment_mode = '';
        $this->resetErrorBag(['name', 'description']);

    }

    #[On('show-add-expense-model-event')]
    public function handleShowExpenseModel()
    {
        $this->resetError();
        $this->item_categories = ItemsCategory::NotEmptyWithCategory()->get();
        $this->items_category_id = $this->item_categories->first()->id;
        $this->getItem($this->items_category_id);
        $this->item_id = $this->items->first()->id;
        $this->units = Unit::get();
        $this->unit_id = $this->units->first()->id;
        $this->dispatch('show-expense-modal');

    }

    #[On('edit-expense-event')]
    public function editExpense(Expenses $expense)
    {
        $this->resetError();
        $this->expense = $expense;

        $this->item_categories = ItemsCategory::NotEmptyWithCategory()->get();
        $this->items_category_id = $expense->items_category_id;
        $this->units = Unit::get();

        $this->getItem($this->items_category_id);

        $this->item_id = $expense->item_id;
        $this->unit_id = $expense->unit_id;
        $this->price = $expense->price;
        $this->qty = $expense->qty;
        $this->description = $expense->description;
        $this->date = $expense->date;
        $this->payment_mode = $expense->payment_mode;
        $this->dispatch('show-expense-modal');

    }

    public function getItem($selected_category_id)
    {
        $this->items = Item::selectedCategory($selected_category_id)->get();
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
