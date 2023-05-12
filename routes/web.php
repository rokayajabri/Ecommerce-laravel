<?php

use App\Http\Controllers\PDFController;
use App\Http\Livewire\AboutComponent;
use App\Http\Livewire\Admin\AdminAddCategoryComponent;
use App\Http\Livewire\Admin\AdminAddProductComponent;
use App\Http\Livewire\Admin\AdminCategoryComponent;
use App\Http\Livewire\Admin\AdminDashboardComponent;
use App\Http\Livewire\Admin\AdminEditCategoryComponent;
use App\Http\Livewire\Admin\AdminEditProductComponent;
use App\Http\Livewire\Admin\AdminEditStatusComponent;
use App\Http\Livewire\Admin\AdminGestionClientComponent;
use App\Http\Livewire\Admin\AdminProductComponent;
use App\Http\Livewire\CartComponent;
use App\Http\Livewire\CategoryComponent;
use App\Http\Livewire\CheckoutComponent;
use App\Http\Livewire\ContactComponent;
use App\Http\Livewire\DetailsComponent;
use App\Http\Livewire\HomeComponent;
use App\Http\Livewire\SearchComponent;
use App\Http\Livewire\ShopComponent;
use App\Http\Livewire\User\UserDashboardComponent;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/',HomeComponent::class)->name('home.index');
Route::get('/shop',ShopComponent::class)->name('shop');
Route::get('/about',AboutComponent::class)->name('about');
Route::get('/product/{slug}', DetailsComponent::class)->name('product.details');
Route::get('/category/{slug}', CategoryComponent::class)->name('product.category');
Route::get('/cart',CartComponent::class)->name('shop.cart');
Route::get('/checkout',CheckoutComponent::class)->name('checkout');
Route::get('/search',SearchComponent::class)->name('product.search');
Route::get('/pdf', [PDFController::class, 'generatePDF'])->name('pdf');
Route::get('/contact',ContactComponent::class)->name('contact');
Route::post('/sendmail',ContactComponent::class)->name('sendmail');



//Route::get('/dashboard', function () {
   // return view('dashboard');
//})->middleware(['auth', 'verified'])->name('dashboard');

//Route::middleware('auth')->group(function () {
   // Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    //Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    //Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
//});

Route::middleware(['auth'])->group(function (){
    Route::get('/user/dashboard', UserDashboardComponent::class)->name('user.dashboard');

});

Route::middleware(['auth','authadmin'])->group(function (){
    Route::get('/admin/dashboard', AdminDashboardComponent::class)->name('admin.dashboard');
    Route::get('/admin/categories', AdminCategoryComponent::class)->name('admin.categories');
    Route::get('/admin/categories/add', AdminAddCategoryComponent::class)->name('admin.categories.add');
    Route::get('/admin/categories/edit{category_id}', AdminEditCategoryComponent::class)->name('admin.categories.edit');

    Route::get('/admin/status/edit{status_id}', AdminEditStatusComponent::class)->name('admin.status.edit');
    Route::get('/admin/users', AdminGestionClientComponent::class)->name('admin.users');


    Route::get('/admin/products', AdminProductComponent::class)->name('admin.products');
    Route::get('/admin/products/add', AdminAddProductComponent::class)->name('admin.products.add');
    Route::get('/admin/products/edit{product_id}', AdminEditProductComponent::class)->name('admin.products.edit');

    Route::get('/produits-export', [AdminProductComponent::class, 'export'])->name('produits.export');
    Route::post('/produits-import', [AdminProductComponent::class, 'import'])->name('produits.import');

});

require __DIR__.'/auth.php';
