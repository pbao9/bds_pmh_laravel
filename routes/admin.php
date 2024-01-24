<?php

use Illuminate\Support\Facades\Route;

use App\Admin\Http\Controllers\HomeController;
use App\Admin\Http\Controllers\Dashboard\DashboardController;
use App\Admin\Http\Controllers\Admin\AdminController;
use App\Admin\Http\Controllers\Admin\AdminSearchController;
use App\Admin\Http\Controllers\Admin\AdminListCustomerController;
use App\Admin\Http\Controllers\Admin\AdminListHouseOwnerController;
use App\Admin\Http\Controllers\Admin\AdminListLandController;
use App\Admin\Http\Controllers\Admin\AdminListMeetingController;
use App\Admin\Http\Controllers\Admin\AdminMoveCustomerController;
use App\Admin\Http\Controllers\Auth\ProfileController;
use App\Admin\Http\Controllers\Auth\ChangePasswordController;
use App\Admin\Http\Controllers\Customer\CustomerController;
use App\Admin\Http\Controllers\Customer\CustomerSearchController;
use App\Admin\Http\Controllers\Customer\CustomerListMeetingController;
use App\Admin\Http\Controllers\HouseOwner\HouseOwnerController;
use App\Admin\Http\Controllers\HouseOwner\HouseOwnerSearchController;
use App\Admin\Http\Controllers\Category\CategoryController;
use App\Admin\Http\Controllers\Category\CategorySearchController;
use App\Admin\Http\Controllers\Land\LandController;
use App\Admin\Http\Controllers\Land\LandRecycleBinController;
use App\Admin\Http\Controllers\Land\LandActionMultipleRecordController;
use App\Admin\Http\Controllers\Post\PostController;
use App\Admin\Http\Controllers\Post\PostActionMultipleRecordController;
use App\Admin\Http\Controllers\Address\DistrictController;
use App\Admin\Http\Controllers\Address\WardController;
use App\Admin\Http\Controllers\Land\LandSearchController;
use App\Admin\Http\Controllers\Meeting\MeetingController;
use App\Admin\Http\Controllers\Contract\ContractController;
use App\Admin\Http\Controllers\Contract\ContractPdfController;
use App\Admin\Http\Controllers\Auth\LoginController;
use App\Admin\Http\Controllers\Auth\LogoutController;
use App\Admin\Http\Controllers\Contract\ContractActionMultipleRecordController;

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/test', [HomeController::class, 'test'])->name('test');

Route::group(['prefix' => '/dang-nhap', 'middleware' => 'guest:admin', 'as' => 'login'], function () {
    Route::get('/', [LoginController::class, 'index']);
    Route::post('/', [LoginController::class, 'login'])->name('.post');
});

Route::group(['middleware' => 'auth.admin:admin'], function () {
    //address
    Route::group(['prefix' => '/dia-chi', 'as' => 'address.'], function () {

        Route::group(['prefix' => '/quan-huyen', 'as' => 'district.'], function () {

            Route::get('/select-search', [DistrictController::class, 'selectSearch'])->name('selectsearch');
        });

        Route::group(['prefix' => '/phuong-xa', 'as' => 'ward.'], function () {

            Route::get('/select-search', [WardController::class, 'selectSearch'])->name('selectsearch');
        });
    });
    //land
    Route::group(['prefix' => '/quan-ly-bat-dong-san', 'as' => 'land.'], function () {
        Route::get('/them', [LandController::class, 'create'])->name('create');

        Route::get('/', [LandController::class, 'index'])->name('index');

        Route::get('/sua/{id}', [LandController::class, 'edit'])->name('edit');

        Route::put('/sua', [LandController::class, 'update'])->name('update');

        Route::post('/them', [LandController::class, 'store'])->name('store');

        Route::delete('/xoa/{id}', [LandController::class, 'destroy'])->name('delete');

        Route::group(['prefix' => '/thung-rac', 'as' => 'recyclebin.'], function () {

            Route::get('/', [LandRecycleBinController::class, 'index'])->name('index');

            Route::put('/khoi-phuc/{id}', [LandRecycleBinController::class, 'restore'])->name('restore');

            Route::delete('/xoa/{id}', [LandRecycleBinController::class, 'delete'])->name('delete');
        });

        Route::post('/xu-ly-nhieu-ban-ghi', [LandActionMultipleRecordController::class, 'action'])->name('multiple');

        Route::get('select-search', [LandSearchController::class, 'selectSearch'])->name('selectsearch');
    });

    //posts
    Route::group(['prefix' => '/quan-ly-tin-tuc', 'as' => 'post.'], function () {
        Route::get('/them', [PostController::class, 'create'])->name('create');

        Route::get('/', [PostController::class, 'index'])->name('index');

        Route::get('/sua/{id}', [PostController::class, 'edit'])->name('edit');

        Route::put('/sua', [PostController::class, 'update'])->name('update');

        Route::post('/them', [PostController::class, 'store'])->name('store');

        Route::delete('/xoa/{id}', [PostController::class, 'destroy'])->name('delete');

        Route::post('/xu-ly-nhieu-ban-ghi', [PostActionMultipleRecordController::class, 'action'])->name('multiple');
    });

    //category
    Route::group(['prefix' => '/quan-ly-danh-muc', 'as' => 'category.'], function () {
        Route::get('/them', [CategoryController::class, 'create'])->name('create');

        Route::get('/', [CategoryController::class, 'index'])->name('index');

        Route::get('/sua/{id}', [CategoryController::class, 'edit'])->name('edit');

        Route::put('/sua', [CategoryController::class, 'update'])->name('update');

        Route::post('/them', [CategoryController::class, 'store'])->name('store');

        Route::delete('/xoa/{id}', [CategoryController::class, 'destroy'])->name('delete');

        Route::get('/select-search', [CategorySearchController::class, 'selectSearch'])->name('selectsearch');
    });

    //house owner
    Route::group(['prefix' => '/quan-ly-chu-nha', 'as' => 'houseowner.'], function () {
        Route::get('/them', [HouseOwnerController::class, 'create'])->name('create');

        Route::get('/', [HouseOwnerController::class, 'index'])->name('index');

        Route::get('/sua/{id}', [HouseOwnerController::class, 'edit'])->name('edit');

        Route::put('/sua', [HouseOwnerController::class, 'update'])->name('update');

        Route::post('/them', [HouseOwnerController::class, 'store'])->name('store');

        Route::delete('/xoa/{id}', [HouseOwnerController::class, 'destroy'])->name('delete');

        Route::get('/select-search', [HouseOwnerSearchController::class, 'selectSearch'])->name('selectsearch');
    });

    //customer
    Route::group(['prefix' => '/quan-ly-hop-dong', 'as' => 'contract.'], function () {
        Route::get('/them', [ContractController::class, 'create'])->name('create');

        Route::get('/', [ContractController::class, 'index'])->name('index');

        Route::get('/sua/{id}', [ContractController::class, 'edit'])->name('edit');

        Route::put('/sua', [ContractController::class, 'update'])->name('update');

        Route::post('/them', [ContractController::class, 'store'])->name('store');

        Route::delete('/xoa/{id}', [ContractController::class, 'destroy'])->name('delete');

        Route::delete('/xoa-nhieu', [ContractController::class, 'destroyMultiple'])->name('deleteMultiple');

        Route::get('/get-form-create/{type}', [ContractController::class, 'getFormCreate'])->name('getFormCreate');

        Route::get('/get-form-edit/{id}/{type}', [ContractController::class, 'getFormEdit'])->name('getFormEdit');

        Route::group(['prefix' => '/pdf', 'as' => 'pdf.'], function () {
            Route::get('/show/{id}', [ContractPdfController::class, 'show'])->name('show');
        });

        Route::post('/xu-ly-nhieu-ban-ghi', [ContractActionMultipleRecordController::class, 'action'])->name('multiple');


        // Route::get('/{id}/danh-sach-cuoc-hen', [CustomerListMeetingController::class, 'index'])->name('listmeeting');

    });

    //customer
    Route::group(['prefix' => '/quan-ly-khach-hang', 'as' => 'customer.'], function () {
        Route::get('/them', [CustomerController::class, 'create'])->name('create');

        Route::get('/', [CustomerController::class, 'index'])->name('index');

        Route::get('/sua/{id}', [CustomerController::class, 'edit'])->name('edit');

        Route::put('/sua', [CustomerController::class, 'update'])->name('update');

        Route::post('/them', [CustomerController::class, 'store'])->name('store');

        Route::delete('/xoa/{id}', [CustomerController::class, 'destroy'])->name('delete');

        Route::get('/select-search', [CustomerSearchController::class, 'selectSearch'])->name('selectsearch');
    });

    // dashboard
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    //admin
    Route::group(['prefix' => '/quan-tri-vien', 'as' => 'admin.', 'middleware' => 'admin.role'], function () {
        Route::get('/them', [AdminController::class, 'create'])->name('create');

        Route::get('/', [AdminController::class, 'index'])->name('index');

        Route::get('/sua/{id}', [AdminController::class, 'edit'])->name('edit');

        Route::put('/sua', [AdminController::class, 'update'])->name('update');

        Route::post('/them', [AdminController::class, 'store'])->name('store');

        Route::delete('/xoa/{id}', [AdminController::class, 'destroy'])->name('delete');

        Route::post('/chuyen-khach-hang', [AdminMoveCustomerController::class, 'store'])->name('movecustomer');

        Route::get('/select-search', [AdminSearchController::class, 'selectSearch'])->name('selectsearch');

        Route::get('/{id}/danh-sach-khach-hang', [AdminListCustomerController::class, 'index'])->name('listcustomer');

        Route::get('/{id}/danh-sach-chu-nha', [AdminListHouseOwnerController::class, 'index'])->name('listhouseowner');
        Route::get('/{id}/danh-sach-bds', [AdminListLandController::class, 'index'])->name('listland');
        Route::get('/{id}/danh-sach-cuoc-hen', [AdminListMeetingController::class, 'index'])->name('listmeeting');
    });

    //auth
    Route::group(['prefix' => '/profile', 'as' => 'profile.'], function () {
        Route::get('/', [ProfileController::class, 'index'])->name('index');
        Route::put('/', [ProfileController::class, 'update'])->name('update');
    });
    Route::group(['prefix' => '/password', 'as' => 'password.'], function () {
        Route::get('/', [ChangePasswordController::class, 'index'])->name('index');
        Route::put('/', [ChangePasswordController::class, 'update'])->name('update');
    });
    Route::post('/logout', [LogoutController::class, 'logout'])->name('logout');
});
