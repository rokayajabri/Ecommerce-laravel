<?php

namespace App\Http\Livewire;

use App\Models\Categories;
use App\Models\Produits;
use Livewire\Component;
use Cart;
class DetailsComponent extends Component
{
    public $slug;
    public function mount($slug){
        $this->slug =$slug;
    }

    public function store($id_produit,$produit_nom,$produit_prix){
        Cart::add($id_produit,$produit_nom,1,$produit_prix)->associate('\App\Models\Produits');
        session()->flash('success_message','Item added in Cart');
        return redirect()->route('shop.cart');
    }

    public function render()
    {
        $categories = Categories::orderBy('id', 'DESC')->take(6)->get();
        $produits=Produits::where('slug',$this->slug)->first();
        $rproduits=Produits::where('category_id',$produits->category_id)->inRandomOrder()->limit(4)->get();
        $nproduits=Produits::Latest()->take(3)->get();
        return view('livewire.details-component',['produits'=>$produits,'categories'=>$categories,'rproduits'=>$rproduits,'nproduits'=>$nproduits]);
    }
}
