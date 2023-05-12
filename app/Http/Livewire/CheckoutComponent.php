<?php

namespace App\Http\Livewire;

use App\Models\Carts;
use App\Models\Clients;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class CheckoutComponent extends Component
{

    public $name;
    public $billing_address;
    public $city;
    public $state;
    public $zipcode;
    public $phone;
    public $email;
    public $payment = 'Cash On Delivery';
    public $note;
    public $image;

    public function placeOrder()
    {
        $this->validate([
            'name' => 'required|string|max:255',
            'billing_address' => 'required|string|max:255',
            'city' => 'required|string|max:255',
            'state' => 'required|string|max:255',
            'zipcode' => 'required|string|max:255',
            'phone' => 'required|string|max:255',
            'email' => 'required|string|email|max:255',
            'note' => 'nullable|string',
            'payment' => 'required|string',
        ]);

        // Create a new client
        $client = Clients::create([
            'id_user' => Auth::user()->id,
            'name' => $this->name,
            'email' => $this->email,
            'billing_address' => $this->billing_address,
            'city' => $this->city,
            'state' => $this->state,
            'zipcode' => $this->zipcode,
            'phone' => $this->phone,
            'note' => $this->note,
        ]);

        // Add each item in the cart to the client's carts

        foreach (Cart::content() as $cartItem) {

            $cart = Carts::create([
                'id_product' => $cartItem->model->id,
                'name' => $cartItem->name,
                'image' => $cartItem->model->image,
                'client_id' => $client->id,
                'payment' => $this->payment,
                'total' => str_replace(',', '.', Cart::total()),
                'subtotal' => Cart::subtotal(),
                'tax' => Cart::tax(),
                'quantity' => $cartItem->qty,
                'price' => $cartItem->price,
            ]);
        }

        // Clear the cart
        Cart::destroy();

        session()->flash('message', 'Order Placed Successfully');

        return $cart;

    }


    public function render()
    {
        $this->name = auth()->user()->name;
        $this->email = auth()->user()->email;
        return view('livewire.checkout-component');
    }
}
