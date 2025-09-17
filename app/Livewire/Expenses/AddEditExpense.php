<?php

namespace App\Livewire\Expenses;

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

    public $description = '';

    public float $price = 0;

    public float $qty = 0;

    public $date = null;

    public string $payment_mode = 'offline';

    #[On('show-add-expense-model-event')]
    public function handleShowExpenseModel()
    {
        $this->dispatch('show-expense-modal');
        $this->item_categories = ItemsCategory::NotEmptyWithCategory()->get();
        $this->getItem($this->item_categories->first()->id);
        $this->units = Unit::get();
    }

    public function getItem($selected_category_id)
    {
        $this->items = Item::selectedCategory($selected_category_id)->get();
    }

    public function render()
    {
        return view('livewire.expenses.add-edit-expense');
    }
}
