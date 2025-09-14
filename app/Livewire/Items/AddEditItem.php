<?php

namespace App\Livewire\Items;

use App\Models\Item;
use App\Models\ItemsCategory;
use Livewire\Attributes\On;
use Livewire\Component;

class AddEditItem extends Component
{
    public $item = null;

    public $item_categories = null;

    public $items_category_id = null;

    public $name = '';

    public $description = '';

    protected $rules = [
        'name' => ['required', 'min:2', 'max:191', 'string', 'unique:items,name'],
        'items_category_id' => ['required', 'exists:items_categories,id'],
        'description' => ['nullable', 'min:3', 'max:500'],
    ];

    protected function resetError()
    {
        $this->name = $this->description = '';
        $this->resetErrorBag(['name', 'description']);

    }

    #[On('show-add-item-model-event')]
    public function ShowAddItemModelHandle()
    {
        $this->resetError();
        $this->dispatch('show-item-modal');
        $this->item_categories = ItemsCategory::get();
    }

    public function save()
    {
        $input_items = $this->validate($this->rules);
        Item::create($input_items);
        session()->flash('message', 'New Item Add Successfully');

        return redirect(request()->header('Referer'));

    }

    #[On('edit-item-event')]
    public function editItemEvent(Item $item)
    {
        $this->resetError();
        $this->item = $item;
        $this->name = $item->name;
        $this->description = $item->description;
        $this->items_category_id = $item->items_category_id;
        $this->item_categories = ItemsCategory::get();
        $this->dispatch('show-item-modal');

    }

    public function update()
    {
        $this->rules['name'] = [
            'required',
            'min:3',
            'max:100',
            'unique:items,name,'.($this->item->id),
        ];
        $input_items = $this->validate($this->rules);
        $this->item->update($input_items);
        session()->flash('message', 'Update Item Successfully');

        return redirect(request()->header('Referer'));

    }

    public function render()
    {
        return view('livewire.items.add-edit-item');
    }
}
