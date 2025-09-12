<?php

namespace App\Livewire\Category;

use App\Models\ItemsCategory;
use Livewire\Attributes\On;
use Livewire\Component;

class AddEditItemCategory extends Component
{
    public $name = '';

    public $description = '';

    public $items_category = null;

    protected $rules = [
        'name' => ['required', 'min:3', 'max:100', 'unique:items_categories,name'],
        'description' => ['nullable', 'min:3', 'max:500'],
    ];

    protected function resetError()
    {
        $this->name = $this->description = '';
        $this->resetErrorBag(['name', 'description']);

    }

    #[On('add-new-category-event')]
    public function handleAddEditItemCategory()
    {
        $this->resetError();
        $this->dispatch('show-add-new-category-modal');
    }

    public function save()
    {
        $category_data = $this->validate($this->rules);
        ItemsCategory::create($category_data);
        session()->flash('message', 'New Category Added Successfully');

        // force full page reload
        return redirect(request()->header('Referer'));

    }

    #[On('edit-category-event')]
    public function handleEditCategory(ItemsCategory $items_category)
    {
        $this->resetError();
        $this->items_category = $items_category;
        $this->name = $items_category->name;
        $this->description = $items_category->description;
        $this->dispatch('show-add-new-category-modal');

    }

    public function update()
    {
        $this->rules['name'] = [
            'required',
            'min:3',
            'max:100',
            'unique:items_categories,name,'.($this->items_category->id),
        ];
        $data = $this->validate($this->rules);
        $this->items_category->update($data);
        session()->flash('message', 'Category Updated Successfully');

        // force full page reload
        return redirect(request()->header('Referer'));

    }

    public function render()
    {
        return view('livewire.category.add-new-category');
    }
}
