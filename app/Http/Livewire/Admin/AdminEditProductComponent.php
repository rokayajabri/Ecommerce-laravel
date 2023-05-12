<?php

namespace App\Http\Livewire\Admin;

use App\Models\Categories;
use App\Models\Produits;
use Carbon\Carbon;
use Livewire\Component;
use Livewire\WithFileUploads;
use  Illuminate\Support\Str;

class AdminEditProductComponent extends Component
{
    use WithFileUploads;
    public $product_id;
    public $nom_produit;
    public $slug;
    public $prix;
    public $stock_status='instock';
    public $quantity;
    public $image;
    public $description_pro;
    public $category_id;
    public $newimage;

    public function mount($product_id){
        $produits=Produits::find($product_id);
        $this->product_id =$produits->id;
        $this->nom_produit =$produits->nom_produit;
        $this->slug =$produits->slug;
        $this->prix =$produits->prix;
        $this->stock_status =$produits->stock_status;
        $this->quantity =$produits->quantity;
        $this->image =$produits->image;
        $this->description_pro =$produits->description_pro;
        $this->category_id =$produits->category_id;

    }

    public function generateSlug(){
        $this->slug =Str::slug($this->nom_produit);
    }
    public function UpdateProduct(){
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
        $produits = Produits::find($this->product_id);
        $produits->nom_produit =$this->nom_produit;
        $produits->slug =$this->slug;
        $produits->prix =$this->prix;
        $produits->stock_status =$this->stock_status;
        $produits->quantity =$this->quantity;
        if($this->newimage)
        {
            unlink('assets/imgs/produits/'.$produits->image);
            $imageName=Carbon::now()->timestamp.'.'.$this->newimage->extension();
            $this->newimage->storeAs('produits',$imageName);
            $produits->image=$imageName;
        }
        $produits->description_pro =$this->description_pro;
        $produits->category_id =$this->category_id;
        $produits->save();
        session()->flash('message','product has been updated successfuly!');

    }

    public function render()
    {
        $categories=Categories::orderBy('libelle','ASC')->get();
        return view('livewire.admin.admin-edit-product-component',['categories'=>$categories]);
    }
}
