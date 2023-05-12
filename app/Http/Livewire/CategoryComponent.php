<?php

namespace App\Http\Livewire;

use App\Models\Categories;
use App\Models\Produits ;
use Livewire\WithPagination;
use Livewire\Component;
use Gloudemans\Shoppingcart\Facades\Cart;
class CategoryComponent extends Component
{
    use WithPagination;
    public $pageSize=12;
    public $orderBy='Default Sorting';
    public $slug;
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

    public function mount($slug){
        $this->slug =$slug;
    }

    public function render()
    {
        $category= Categories::where('slug',$this->slug)->first();
        $category_id= $category->id;
        $category_name =$category->libelle;

        if($this->orderBy == 'Price: Low to High'){
            $produits = Produits::where('category_id',$category_id)->orderBy('prix','ASC')->paginate($this->pageSize);
        }
        else if($this->orderBy == 'Price: High to Low'){
            $produits = Produits::where('category_id',$category_id)->orderBy('prix','DESC')->paginate($this->pageSize);
        }
        else if($this->orderBy == 'Sort By Newness'){
            $produits = Produits::where('category_id',$category_id)->orderBy('created_at','DESC')->paginate($this->pageSize);
        }
        else{

        $produits=Produits::where('category_id',$category_id)->paginate($this->pageSize);
        }
        $categories=Categories::orderBy('libelle','ASC')->limit(8)->get();
        $nproduits=Produits::Latest()->take(4)->get();
        return view('livewire.category-component',['produits'=>$produits,'categories'=>$categories,'nproduits'=>$nproduits,'category_name'=>$category_name]);
    }

}
