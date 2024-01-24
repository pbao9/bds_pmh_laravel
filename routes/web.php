<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\StaffController;

Route::redirect('/', '/bdsmini/admin');
Route::get('/', function () {
    return view('home.index');
})->name('home');
Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/khach-hang/{id}', [CustomerController::class, 'index'])->name('customerProduct');

Route::get('/tim-kiem', [HomeController::class, 'timKiem'])->name('timKiem');

Route::get('/ket-qua-tim-kiem', [HomeController::class, 'ketquaview']);
Route::post('/ket-qua-tim-kiem', [HomeController::class, 'ketquatimkiem'])->name('ketquatimkiem');

Route::group(['prefix' => '/danh-muc-san-pham'], function () {
    Route::group(['prefix' => '/{category}'], function () {
        Route::get('/', [CategoryController::class, 'index'])->name('category');
        Route::get('/{product}', [ProductController::class, 'index'])->name('indexProduct');
    });
}); 

// Route::get('/khach-hang/{id}', [CustomerController::class, 'index'])->name('customerProduct');
Route::get('/nhan-vien/{id}', [StaffController::class,'index'])->name('staffProduct');

Route::get('/tim-kiem', [HomeController::class, 'timKiem'])->name('timKiem');
Route::group(['prefix' => '/quan'], function () {
    Route::get('/{district}', [CategoryController::class, 'indexDistrict'])->name('indexDistrict');
});

Route::group(['prefix' => '/muc-dich'], function () {
    Route::get('/{purpose}', [CategoryController::class, 'indexPurpose'])->name('purpose');
});

Route::group(['prefix' => '/tin-tuc'], function () {
    Route::get('/', [PostController::class, 'index'])->name('post');
    Route::get('/{post}', [PostController::class, 'post'])->name('indexPost');
    
    Route::group(['prefix' => '/{category}'], function () {
        Route::get('/', [PostController::class, 'category'])->name('postCategory');
    });
});

Route::get('/gioi-thieu', function(){
    return view('home.introduce');
});
Route::get('/lien-he', function(){
    return view('home.contact');
});