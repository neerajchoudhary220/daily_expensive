<?php

namespace App\Livewire\Category;

use App\Models\ExpensesCategory;
use Livewire\Attributes\On;
use Livewire\Component;

class AddNewCategory extends Component
{
    public $name = '';

    public $description = '';

    public $expenses_category = null;

    protected $rules = [
        'name' => ['required', 'min:3', 'max:100', 'unique:expenses_categories,name'],
        'description' => ['nullable', 'min:3', 'max:500'],
    ];

    protected function resetError()
    {
        $this->resetErrorBag(['name', 'description']);

    }

    #[On('add-new-category-event')]
    public function handleAddNewCategory()
    {
        $this->resetError();
        $this->dispatch('show-add-new-category-modal');
    }

    public function save()
    {
        $category_data = $this->validate($this->rules);
        ExpensesCategory::create($category_data);
        session()->flash('message', 'New Category Added Successfully');

        // force full page reload
        return redirect(request()->header('Referer'));

    }

    #[On('edit-category-event')]
    public function handleEditCategory(ExpensesCategory $expenses_category)
    {
        $this->resetError();
        $this->expenses_category = $expenses_category;
        $this->name = $expenses_category->name;
        $this->description = $expenses_category->description;
        $this->dispatch('show-add-new-category-modal');

    }

    public function update()
    {
        $this->rules['name'] = [
            'required',
            'min:3',
            'max:100',
            'unique:expenses_categories,name,'.($this->expenses_category->id),
        ];
        $data = $this->validate($this->rules);
        $this->expenses_category->update($data);
        session()->flash('message', 'Category Updated Successfully');

        // force full page reload
        return redirect(request()->header('Referer'));

    }

    public function render()
    {
        return view('livewire.category.add-new-category');
    }
}
