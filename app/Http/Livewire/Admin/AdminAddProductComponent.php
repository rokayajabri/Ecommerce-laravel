<?php

namespace App\Http\Livewire\Admin;

use App\Models\Categories;
use App\Models\Produits;
use Carbon\Carbon;
use Livewire\Component;
use Livewire\WithFileUploads;
use  Illuminate\Support\Str;

class AdminAddProductComponent extends Component
{
    use WithFileUploads;

    public $nom_produit;
    public $slug;
    public $prix;
    public $stock_status='instock';
    public $quantity;
    public $image;
    public $description_pro;
    public $category_id;

    public function generateSlug(){
        $this->slug =Str::slug($this->nom_produit);
    }
    public function AddProduct(){
        $this->validate([
            'nom_produit'=>'required',
            'slug'=>'required',
            'prix'=>'required',
            'stock_status'=>'required',
            'quantity'=>'required',
            'image'=>'required',
            'description_pro'=>'required',
            'category_id'=>'required',
        ]);
        $produits = new Produits();
        $produits->nom_produit =$this->nom_produit;
        $produits->slug =$this->slug;
        $produits->prix =$this->prix;
        $produits->stock_status =$this->stock_status;
        $produits->quantity =$this->quantity;
        $imageName=Carbon::now()->timestamp.'.'.$this->image->extension();
        $this->image->storeAs('produits',$imageName);
        $produits->image=$imageName;
        $produits->description_pro =$this->description_pro;
        $produits->category_id =$this->category_id;
        $produits->save();
        session()->flash('message','product has been created successfuly!');

    }

    public function render()
    {
        $categories=Categories::orderBy('libelle','ASC')->get();
        return view('livewire.admin.admin-add-product-component',['categories'=>$categories]);
    }
}
