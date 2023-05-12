<?php

namespace App\Http\Livewire;

use App\Models\Categories;
use App\Models\Produits ;
use Livewire\WithPagination;
use Livewire\Component;
use Cart;
class ShopComponent extends Component
{
    use WithPagination;
    public $pageSize=12;
    public $orderBy='Default Sorting';

    public $min_value=0;
    public $max_value=1000;


    public function store($id_produit,$produit_nom,$produit_prix){
        Cart::add($id_produit,$produit_nom,1,$produit_prix)->associate('\App\Models\Produits');
        session()->flash('success_message','Item added in Cart');
        return redirect()->route('shop.cart');
    }

    public function changePageSize($size){
        $this->pageSize =$size;
    }

    public function changeOrderBy($order){
        $this->orderBy =$order;
    }

    public function render()
    {
        if($this->orderBy == 'Price: Low to High'){
            $produits = Produits::whereBetween('prix',[$this->min_value,$this->max_value])->orderBy('prix','ASC')->paginate($this->pageSize);
        }
        else if($this->orderBy == 'Price: High to Low'){
            $produits = Produits::whereBetween('prix',[$this->min_value,$this->max_value])->orderBy('prix','DESC')->paginate($this->pageSize);
        }
        else if($this->orderBy == 'Sort By Newness'){
            $produits = Produits::whereBetween('prix',[$this->min_value,$this->max_value])->orderBy('created_at','DESC')->paginate($this->pageSize);
        }
        else{

        $produits=Produits::whereBetween('prix',[$this->min_value,$this->max_value])->paginate($this->pageSize);
        }
        $categories=Categories::orderBy('libelle','ASC')->limit(8)->get();
        $nproduits=Produits::Latest()->take(4)->get();
        return view('livewire.shop-component',['produits'=>$produits,'categories'=>$categories,'nproduits'=>$nproduits]);
    }

}
