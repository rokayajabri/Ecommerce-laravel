<?php

namespace App\Exports;

use App\Models\Produits;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class ProduitsExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Produits::select("id","nom_produit","stock_status","prix","category_id","created_at")->get();
    }

    /**
     * Write code on Method
     *
     * @return response()
     */
    public function headings(): array
    {
        return ["ID","Nom_produit","Stock_status","Prix","Category_id","Created_at"];
    }
}
