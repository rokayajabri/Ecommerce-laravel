<div>
    <main class="main">
        <div class="page-header breadcrumb-wrap">
            <div class="container">
                <div class="breadcrumb">
                    <a href="{{route('shop')}}" rel="nofollow">Home</a>
                    <span></span> Shop
                    <span></span> Checkout
                </div>
            </div>
        </div>
        <section class="mt-50 mb-50">
            <div class="container">
                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-25">
                            <h4>Billing Details</h4>
                        </div>
                        <form wire:submit.prevent="placeOrder">
                            <div class="form-group">
                                <input type="text" required="" name="name" placeholder="first name and last name *" wire:model="name">
                            </div>
                            <div class="form-group">
                                <input type="text" name="billing_address" required="" placeholder="Address *" wire:model="billing_address">
                            </div>
                            <div class="form-group">
                                <input required="" type="text" name="city" placeholder="City / Town *" wire:model="city">
                            </div>
                            <div class="form-group">
                                <input required="" type="text" name="state" placeholder="State / County *" wire:model="state">
                            </div>
                            <div class="form-group">
                                <input required="" type="text" name="zipcode" placeholder="Postcode / ZIP *" wire:model="zipcode">
                            </div>
                            <div class="form-group">
                                <input required="" type="text" name="phone" placeholder="Phone *" wire:model="phone">
                            </div>
                            <div class="form-group">
                                <input required="" type="text" name="email" placeholder="Email address *" wire:model="email">
                            </div>

                            <div class="payment_method">
                                <h5>Payment</h5>
                                <div class="payment_option">
                                    <div class="custom-radio">
                                        <input type="radio" id="exampleRadios3" name="payment" value="Cash On Delivery"  style="width:15px" wire:model="payment" >Cash On Delivery
                                        <input type="radio" id="exampleRadios4" name="payment" value="Card Payment"  style="width: 15px" wire:model="payment" >Card Payment
                                        <input type="radio" id="exampleRadios5" name="payment" value="Paypal" style="width:15px" wire:model="payment" >Paypal <br>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="mb-20" style="margin-top: 14px">
                                <h5>Additional information</h5>
                            </div>
                            <div class="form-group mb-15">
                                <textarea rows="3" name="note" placeholder="Order notes" wire:model="note"></textarea>
                            </div>

                            <div>
                                <button type="submit" name="place_order_btn" class="btn btn-fill-out btn-block mt-30">Place Your order</button>
                            </div>
                        </form>
                        @if (Session::has('message'))
                        <div class="alert alert-success" role="alert">
                            {{Session::get('message')}}
                        </div>
                    @endif
                    </div>
                    <div class="col-md-6">
                        <div class="order_review">
                            <div class="mb-20">
                                <h4>Your Orders</h4>
                            </div>
                            <div class="table-responsive order_table text-center">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th colspan="2">Product</th>
                                            <th>Total</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach (Cart::content() as $item)
                                        <tr>
                                            <td class="image product-thumbnail"><img src="{{asset('assets/imgs/produits')}}/{{$item->model->image}}" alt="{{$item->model->nom_produit}}"></td>
                                            <td>
                                                <h5><a href="{{route('product.details',['slug'=>$item->model->slug])}}">{{substr($item->model->nom_produit,0,20)}}...</a></h5><span class="product-qty">x {{$item->qty}}</span>
                                            </td>
                                            <td>${{$item->model->prix}}</td>
                                        </tr>
                                        @endforeach
                                        <tr>
                                            <th>SubTotal</th>
                                            <td class="product-subtotal" colspan="2">${{Cart::subtotal()}}</td>
                                        </tr>
                                        <tr>
                                            <th>Tax</th>
                                            <td class="product-subtotal" colspan="2">${{Cart::tax()}}</td>
                                        </tr>
                                        <tr>
                                            <th>Shipping</th>
                                            <td colspan="2"><em>Free Shipping</em></td>
                                        </tr>
                                        <tr>
                                            <th>Total</th>
                                            <td colspan="2" class="product-subtotal"><span class="font-xl text-brand fw-900">$${{Cart::total()}}</span></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="bt-1 border-color-1 mt-30 mb-30"></div>

                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>

</div>
