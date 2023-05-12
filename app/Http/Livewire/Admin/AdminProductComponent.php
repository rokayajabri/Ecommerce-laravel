<?php

namespace App\Http\Livewire\Admin;

use App\Exports\ProduitsExport;
use App\Imports\ProduitsImport;
use App\Models\Produits;
use Livewire\WithPagination;
use Livewire\Component;
use Maatwebsite\Excel\Facades\Excel;

class AdminProductComponent extends Component
{
    public $product_id;

    use WithPagination;

    public function deleteProduct(){
        $produits=Produits::find($this->product_id);
        unlink('assets/imgs/produits/'.$produits->image);
        $produits->delete();
        session()->flash('message','Product has been deleted successfully!');

    }
    public function export()
    {
        return Excel::download(new ProduitsExport, 'produits.xlsx');
    }

    public function import()
    {
        Excel::import(new ProduitsImport,request()->file('file'));

        return back();
    }

    public function render()
    {
        $produits=Produits::orderBy('created_at','DESC')->paginate(10);
        return view('livewire.admin.admin-product-component',['produits'=>$produits]);
    }
}
