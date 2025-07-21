<?php

use App\Http\Controllers\CartController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ReviewsController;
use App\Models\Cart;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

//
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

Auth::routes(['register' => false]);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::get('/', [CategoryController::class, 'MainPage']);

Route::get('/products/{catid?}', [CategoryController::class, 'GetCategoryProduct'])->name('prods');
Route::get('/category', [CategoryController::class, 'GetAllCategorywithProduct'])->name('cats');


Route::get('/reviews', [ReviewsController::class, 'reviews']);
Route::post('/storereviews', [ReviewsController::class, 'storereviews']);

Route::get('/removeproductphoto/{productphotoid?}', [ProductController::class, 'RemoveProductPhoto']);

Route::post('storeProductImage', [ProductController::class,'StoreproductImages']);
Route::get('/editproducts/{productid?}', [ProductController::class, 'EditProduct']);

Route::get('/addproduct', [ProductController::class, 'Addproduct']);

Route::post('/storeproduct', [ProductController::class, 'Storeproduct']);


Route::post('/search', function (Request $request) {
    $request->validate([
        'searchkey' => 'required|string|min:2'
    ]);

    $products = Product::where('name', 'LIKE', '%' . $request->searchkey . '%')
        ->orWhere('description', 'LIKE', '%' . $request->searchkey . '%')
        ->paginate(10);

    return view('product', ['products' => $products]);
});

Route::get('/removeproducts/{productid?}', [ProductController::class, 'RemoveProduct']);

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/productsTable', [ProductController::class, 'ProductsTable']);

Route::get('/AddproductImage/{productid}', [ProductController::class, 'AddproductImage']);

Route::get('/cart', [CartController::class, 'cart'])->middleware('auth');

Route::get('/addproducttocart/{productid}', function ($productid) {
    $user_id = auth()->user()->id;

    $result = Cart::where('user_id', $user_id)->where('product_id', $productid)->first();


    if ($result) {
        $result->quantity += 1;
        $result->save();
    } else {
        $newcart = new Cart();
        $newcart->product_id = $productid;
        $newcart->user_id = auth()->user()->id;
        $newcart->quantity = 1;
        $newcart->save();
    }


    return redirect('/cart');
})->middleware('auth');

Route::get('/deletecartitem/{cartid}', function ($cartid) {
    Cart::first()->where('id', $cartid)->delete();
    return redirect('/cart');
})->middleware('auth');

Route::get('/single-product/{productid}',[ProductController::class,'ShowProduct']);


Route::get('/Completeorder',[CartController::class,'Completeorder'])->middleware('auth');
Route::get('/previousorder ',[CartController::class,'Previousorder'])->middleware('auth');

Route::post('/storeorder',[CartController::class,'Storeorder']);



Route::post('/lan',function(Request  $request){
    session()->put('locale',$request ->locale);

return redirect()->back();


})->name('changeLanguage');


Route::get('/admin',function(){

    return"admin panel";
})->middleware('checkrole:admin,salesman');
 