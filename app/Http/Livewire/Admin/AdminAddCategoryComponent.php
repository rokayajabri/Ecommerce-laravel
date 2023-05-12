<?php

namespace App\Http\Livewire\Admin;

use App\Models\Categories;
use Livewire\Component;
use  Illuminate\Support\Str;

class AdminAddCategoryComponent extends Component
{
    public $libelle;
    public $slug;

    public function generateSlug(){
        $this->slug =Str::slug($this->libelle);
    }

    public function updated($fields){
        $this->validateOnly($fields,[
            'libelle'=>'required',
            'slug'=>'required',
        ]);
    }
    public function storeCategory(){
        $this->validate([
            'libelle'=>'required',
            'slug'=>'required',
        ]);
        $category = new Categories();
        $category->libelle =$this->libelle;
        $category->slug =$this->slug;
        $category->save();
        session()->flash('message','category has been created successfuly!');

    }

    public function render()
    {
        return view('livewire.admin.admin-add-category-component');
    }
}
