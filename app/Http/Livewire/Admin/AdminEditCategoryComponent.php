<?php

namespace App\Http\Livewire\Admin;

use App\Models\Categories;
use Livewire\Component;
use  Illuminate\Support\Str;
class AdminEditCategoryComponent extends Component
{
    public $category_id;
    public $libelle;
    public $slug;

    public function mount($category_id){
        $category= Categories::find($category_id);
        $this->category_id = $category->id;
        $this->libelle = $category->libelle;
        $this->slug = $category->slug;
    }

    public function generateSlug(){
        $this->slug =Str::slug($this->libelle);
    }

    public function updated($fields){
        $this->validateOnly($fields,[
            'libelle'=>'required',
            'slug'=>'required',
        ]);
    }

    public function updateCatecory(){
        $this->validate([
            'libelle'=>'required',
            'slug'=>'required',
        ]);
        $category= Categories::find($this->category_id);
        $category->libelle = $this->libelle;
        $category->slug = $this->slug;
        $category->save();
        session()->flash('message','category has been updated successfuly!');

    }
    public function render()
    {
        return view('livewire.admin.admin-edit-category-component');
    }
}
