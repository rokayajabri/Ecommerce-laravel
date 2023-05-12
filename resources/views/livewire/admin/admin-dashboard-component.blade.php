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
                    <span></span> List of all orders
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
                                        List of all orders
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
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
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
                                                <td>
                                                    <a href="{{ route('admin.status.edit', ['status_id' => $cart->id]) }}" class="text-info">Edit</a>
                                                </td>
                                            </tr>
                                        @endforeach
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

