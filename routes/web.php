<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\AdminCategoryController;
use App\Http\Controllers\Admin\AdminCountryController;
use App\Http\Controllers\Admin\AdminBlogController;
use App\Http\Controllers\Admin\AdminBrandController;
use App\Http\Controllers\Admin\OnePageController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Client\ClientController;
use App\Http\Controllers\Client\CartController;
use App\Http\Controllers\Client\CheckoutController;
use App\Http\Controllers\Client\LoginController;
use App\Http\Controllers\Client\RegisterController;
use App\Http\Controllers\Client\BlogController;
use App\Http\Controllers\Client\CommentController;
use App\Http\Controllers\Client\ProductController;
use App\Http\Controllers\Client\SearchController;
use App\Http\Controllers\CauThuController;
use App\Http\Controllers\MailController;

Route::get('/', function () {
    return view('welcome');
});

// Route::get('/login', function () {
//     return view('login');
// });


Route::get('/list-user' ,[UserController::class,'list']);

Route::get('/insert-user' ,[UserController::class,'getInsert']);
Route::post('/insert-user' ,[UserController::class,'postInsert']);

Route::get('/edit-user/{id}' ,[UserController::class,'getEdit']);
Route::post('/edit-user/{id}' ,[UserController::class,'postEdit']);

Route::get('/delete-user/{id}' ,[UserController::class,'getDelete']);
Route::post('/delete-user/{id}' ,[UserController::class,'postDelete']);


Route::get('/list-cau-thu' ,[CauThuController::class,'list']);

Route::get('/insert-cau-thu' ,[CauThuController::class,'getInsert']);
Route::post('/insert-cau-thu' ,[CauThuController::class,'postInsert']);

Route::get('/edit-cau-thu/{id}' ,[CauThuController::class,'getEdit']);
Route::post('/edit-cau-thu/{id}' ,[CauThuController::class,'postEdit']);

Route::get('/delete-cau-thu/{id}' ,[CauThuController::class,'getDelete']);

// - Email
Route::get('/test',[MailController::class,'index']);


// - Client\
Route::group([
    'middleware' => ['isLogin'],
], function(){
    Route::get('/register-user',[RegisterController::class,'getRegister']);
    Route::post('/register-user',[RegisterController::class,'postRegister']);

    Route::get('/login-user',[LoginController::class,'getLogin']);
    Route::post('/login-user',[LoginController::class,'postLogin']);
});
Route::get('/',[ClientController::class,'getClient']);

Route::get('/blog-list',[BlogController::class,'getBlogList']);
Route::post('/blog-list',[BlogController::class,'postBlogList']);
Route::get('/blog-single/{id}',[BlogController::class,'getBlogSingle']);

Route::get('/product-detail/{id}',[ClientController::class,'getProductDetail']);
Route::post('/cart/update-product-qty/ajax',[CartController::class,'postAddToCartAjax']);
Route::get('/cart',[CartController::class,'getCart']);
Route::post('/cart/cart-qty-delete/ajax',[CartController::class,'postCartQtyDeleteAjax']);
Route::get('/checkout',[CheckoutController::class,'getCheckout']);

Route::get('/search',[SearchController::class,'getSearch']);
Route::post('/search-price/ajax',[SearchController::class,'postSearchPriceAjax']);


// Yêu cầu đăng nhập
Auth::routes();

// - Client
Route::get('/logout-user',[LoginController::class,'logout']);

Route::group([
    'middleware' => ['user'],
], function(){
    Route::post('/blog/rate/ajax',[BlogController::class,'postRateAjax']);
    Route::post('/blog/comment/ajax',[CommentController::class,'postCommentAjax']);

    Route::get('/account/update', [ClientController::class,'getUpdateAccount']);
    Route::post('/account/update', [ClientController::class,'postUpdateAccount']);

    Route::get('/account/my-product', [ProductController::class,'getMyProduct']);
    Route::get('/account/add-product', [ProductController::class,'getAddProduct']);
    Route::post('/account/add-product', [ProductController::class,'postAddProduct']);
    Route::get('/account/edit-product/{id}', [ProductController::class,'getEditProduct']);
    Route::post('/account/edit-product/{id}', [ProductController::class,'postEditProduct']);
    Route::get('/account/delete-product/{id}', [ProductController::class,'deleteProduct']);

});


// - Admin

Route::group([
    'prefix' => 'admin', // tiền tố admin đứng trước 
    'middleware' => ['admin'],

], function(){

    Route::get('/dashboard',[DashboardController::class,'index']);
    Route::get('/profile',[UserController::class,'index']);
    Route::post('/profile',[UserController::class,'postUpdateProfile']);
    
    // Country
    Route::get('/country',[AdminCountryController::class,'getCountry']);
    Route::get('/add-country' ,[AdminCountryController::class,'getAddCountry']);
    Route::post('/add-country' ,[AdminCountryController::class,'postAddCountry']);
    Route::get('/delete-country/{id}' ,[AdminCountryController::class,'deleteCountry']);

    // Catalog
    Route::get('/category',[AdminCategoryController::class,'getCategory']);
    Route::get('/add-category' ,[AdminCategoryController::class,'getAddCategory']);
    Route::post('/add-category' ,[AdminCategoryController::class,'postAddCategory']);
    Route::get('/delete-category/{id}' ,[AdminCategoryController::class,'deleteCategory']);

    // Brand
    Route::get('/brand',[AdminBrandController::class,'getBrand']);
    Route::get('/add-brand' ,[AdminBrandController::class,'getAddBrand']);
    Route::post('/add-brand' ,[AdminBrandController::class,'postAddBrand']);
    Route::get('/delete-brand/{id}' ,[AdminBrandController::class,'deleteBrand']);
    
    // Blog
    Route::get('/list-blog',[AdminBlogController::class,'getBlog']);
    Route::get('/add-blog' ,[AdminBlogController::class,'getAddBlog']);
    Route::post('/add-blog' ,[AdminBlogController::class,'postAddBlog']);
    Route::get('/edit-blog/{id}' ,[AdminBlogController::class,'getEditBlog']);
    Route::post('/edit-blog/{id}' ,[AdminBlogController::class,'postEditBlog']);
    Route::get('/delete-blog/{id}' ,[AdminBlogController::class,'deleteBlog']);
});





Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
