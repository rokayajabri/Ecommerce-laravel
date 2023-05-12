<?php

namespace App\Http\Livewire;

use App\Models\Categories;
use App\Models\Produits;
use Livewire\Component;
use Livewire\WithPagination;

class HomeComponent extends Component
{
    use WithPagination;
    public function render()
    {
        $produits = Produits::orderBy('id', 'DESC')->take(4)->get();
        $categories = Categories::orderBy('id', 'DESC')->take(8)->get();
        return view('livewire.home-component',['produits'=>$produits,'categories'=>$categories]);
    }
}
