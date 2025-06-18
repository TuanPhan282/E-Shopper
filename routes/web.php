<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Client\ClientController;
use App\Http\Controllers\Client\LoginController;
use App\Http\Controllers\Client\RegisterController;
use App\Http\Controllers\Client\BlogController;
use App\Http\Controllers\Client\CommentController;
use App\Http\Controllers\CauThuController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\OnePageController;

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


// - Client
Route::get('/',[ClientController::class,'getClient']);
Route::get('/register-user',[RegisterController::class,'getRegister']);
Route::post('/register-user',[RegisterController::class,'postRegister']);

Route::get('/login-user',[LoginController::class,'getLogin']);
Route::post('/login-user',[LoginController::class,'postLogin']);

Route::get('/blog-list',[BlogController::class,'getBlogList']);
Route::post('/blog-list',[BlogController::class,'postBlogList']);
Route::get('/blog-single/{id}',[BlogController::class,'getBlogSingle']);


// Yêu cầu đăng nhập
Auth::routes();

// - Client
Route::post('/blog/rate/ajax',[BlogController::class,'postRateAjax']);
Route::post('/blog/comment/ajax',[CommentController::class,'postCommentAjax']);

// - Admin

Route::group([
    // 'prefix' => 'admin', // tiền tố admin đứng trước 
    'middleware' => ['admin'],

], function(){

    Route::get('/dashboard',[DashboardController::class,'index']);
    Route::get('/profile',[UserController::class,'index']);
    Route::post('/profile',[UserController::class,'postUpdateProfile']);
    
    Route::get('/country',[UserController::class,'getCountry']);
    Route::get('/add-country' ,[UserController::class,'getAddCountry']);
    Route::post('/add-country' ,[UserController::class,'postAddCountry']);
    Route::get('/delete-country/{id}' ,[UserController::class,'deleteCountry']);
    
    Route::get('/list-blog',[UserController::class,'getBlog']);
    Route::get('/add-blog' ,[UserController::class,'getAddBlog']);
    Route::post('/add-blog' ,[UserController::class,'postAddBlog']);
    Route::get('/edit-blog/{id}' ,[UserController::class,'getEditBlog']);
    Route::post('/edit-blog/{id}' ,[UserController::class,'postEditBlog']);
    Route::get('/delete-blog/{id}' ,[UserController::class,'deleteBlog']);
});





Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
