<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PDF;
use Gloudemans\Shoppingcart\Facades\Cart;
class PDFController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function generatePDF()
    {
        $produits = Cart::content();

        $data = [
            'title' => 'Welcome to shopping bills',
            'date' => date('m/d/Y'),
            'produits' => $produits
        ];

        $pdf = PDF::loadView('myPDF', $data);

        return $pdf->download('facture.pdf');
    }
}
