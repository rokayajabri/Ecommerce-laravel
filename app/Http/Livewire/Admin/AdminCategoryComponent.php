<?php

namespace App\Http\Livewire\Admin;

use App\Models\Categories;
use Livewire\Component;
use Livewire\WithPagination;

class AdminCategoryComponent extends Component
{
    public $category_id;

    use WithPagination;

    public function deleteCategory(){
        $categories=Categories::find($this->category_id);
        $categories->delete();
        session()->flash('message','Category has been deleted successfully!');

    }

    public function render()
    {
        $categories=Categories::orderBy('libelle','ASC')->paginate(5);
        return view('livewire.admin.admin-category-component',['categories'=>$categories]);
    }
}
