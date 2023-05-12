<?php

namespace App\Imports;

use App\Models\Produits;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class ProduitsImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Produits([
            'nom_produit'     => $row['nom_produit'],
            'stock_status'    => $row['stock_status'],
            'prix'    => $row['prix'],
            'category_id'     => $row['category_id'],
            'created_at'    => $row['created_at'],

        ]);
    }
}
