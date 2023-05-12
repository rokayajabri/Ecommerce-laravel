<div>
    <style>
        nav svg{
            height: 20px;
        }
        nav .hidden{
            display: block;
        }
    </style>
    <main class="main">
        <div class="page-header breadcrumb-wrap">
            <div class="container">
                <div class="breadcrumb">
                    <a href="/" rel="nofollow">Home</a>
                    <span></span> Display of command history
                </div>
            </div>
        </div>
        <section class="mt-50 mb-50">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <div class="row">
                                    <div class="col-md-6">
                                        Display of command history
                                    </div>
                                </div>
                            </div>
                            <div class="card-body">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Image</th>
                                            <th>Name</th>
                                            <th>Customer Name</th>
                                            <th>Quantity</th>
                                            <th>Price</th>
                                            <th>Total</th>
                                            <th>Tax</th>
                                            <th>SubTotal</th>
                                            <th>Payment</th>
                                            <th>Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @if ($carts->count() > 0)
                                        @foreach ($carts as $cart)
                                            <tr>
                                                <td>{{$cart->id}}</td>
                                                <td><img src="{{asset('assets/imgs/produits')}}/{{$cart->image}}" alt="{{$cart->name}}" width="60"></td>
                                                <td>{{$cart->name}}</td>
                                                <td>{{$cart->clients->user->name}}</td>
                                                <td>{{$cart->quantity}}</td>
                                                <td>{{$cart->price}}</td>
                                                <td>{{$cart->total}}</td>
                                                <td>{{$cart->tax}}</td>
                                                <td>{{$cart->subtotal}}</td>
                                                <td>{{$cart->payment}}</td>
                                                <td>{{$cart->confirmation}}</td>
                                            </tr>
                                        @endforeach
                                        @else
                                            <p>No commands found for you.</p>
                                        @endif
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
</div>

