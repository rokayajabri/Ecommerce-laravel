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
                    <span></span> Edit Product
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
                                        Edit Product
                                    </div>
                                    <div class="col-md-6">
                                       <a href="{{route('admin.products')}}" class="btn btn-success float-end">All Products</a>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body">
                                @if (Session::has('message'))
                                    <div class="alert alert-success" role="alert">
                                        {{Session::get('message')}}
                                    </div>
                                @endif
                                <form wire:submit.prevent="UpdateProduct">
                                    <div class="mb-3 mt-3">
                                        <label for="nom" class="form-label">Name</label>
                                        <input type="text" name="nom" class="form-control" placeholder="Enter product name" wire:model='nom_produit' wire:keyup="generateSlug">
                                        @error('name')
                                            <p class="text-danger">{{$message}}</p>
                                        @enderror
                                    </div>
                                    <div class="mb-3 mt-3">
                                        <label for="slug" class="form-label">Slug</label>
                                        <input type="text" name="slug" class="form-control" placeholder="Enter product slug" wire:model='slug' wire:keyup="generateSlug">
                                        @error('slug')
                                            <p class="text-danger">{{$message}}</p>
                                        @enderror
                                    </div>
                                    <div class="mb-3 mt-3">
                                        <label for="desc" class="form-label">Description</label>
                                        <textarea type="text" name="desc" class="form-control" placeholder="Enter product description" wire:model='description_pro' wire:keyup="generateSlug"></textarea>
                                        @error('Description')
                                            <p class="text-danger">{{$message}}</p>
                                        @enderror
                                    </div>
                                    <div class="mb-3 mt-3">
                                        <label for="price" class="form-label">Price</label>
                                        <input type="number" name="price" class="form-control" placeholder="Enter product price" wire:model='prix' wire:keyup="generateSlug">
                                        @error('price')
                                            <p class="text-danger">{{$message}}</p>
                                        @enderror
                                    </div>
                                    <div class="mb-3 mt-3">
                                        <label for="stock" class="form-label">Stock Status</label>
                                        <select class="form-control" name="stock_status" wire:model="stock_status">
                                            <option value="instock">instock</option>
                                            <option value="outotstock">Out ot Stock</option>
                                        </select>
                                        @error('stock status')
                                            <p class="text-danger">{{$message}}</p>
                                        @enderror
                                    </div>
                                    <div class="mb-3 mt-3">
                                        <label for="quantity" class="form-label">Qantity</label>
                                        <input type="number" name="quantity" class="form-control" placeholder="Enter product quantity" wire:model='quantity' wire:keyup="generateSlug">
                                        @error('quantity')
                                            <p class="text-danger">{{$message}}</p>
                                        @enderror
                                    </div>
                                    <div class="mb-3 mt-3">
                                        <label for="image" class="form-label">Image</label>
                                        <input type="file" name="image" class="form-control" wire:model='newimage' />
                                        @if ($newimage)
                                            <img src="{{$newimage->temporaryUrl()}}" width="120" />
                                        @else
                                            <img src="{{asset('assets/imgs/produits')}}/{{$image}}" width="120" />
                                        @endif

                                        @error('newimage')
                                            <p class="text-danger">{{$message}}</p>
                                        @enderror
                                    </div>

                                    <div class="mb-3 mt-3">
                                        <label for="category" class="form-label">Select Category</label>
                                        <select class="form-control" name="category_id" wire:model="category_id">
                                            @foreach ($categories as $categorie )
                                                <option value="{{$categorie->id}}">{{$categorie->libelle}}</option>
                                            @endforeach
                                        </select>
                                        @error('category')
                                            <p class="text-danger">{{$message}}</p>
                                        @enderror
                                    </div>
                                    <button type="submit" class="btn btn-primary float-end">Update</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
</div>
