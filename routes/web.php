<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\PartnerController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\SpecialityController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\RolesController;
use App\Http\Controllers\PermissionsController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProviderController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\SettingController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [HomeController::class,'index']);

// user root
Route::group(['prefix' => 'admin'], function () {
    Auth::routes();
    Route::group(['middleware' => ['auth']], function () {
        Route::get('/home', [DashboardController::class, 'index'])->name('home')->middleware(['permission:home_listing']);
        Route::resource('category', CategoryController::class);
        Route::post('category/listing', [CategoryController::class, 'listing'])->name('category.listing')->middleware(['permission:category_listing']);
        Route::resource('service', ServiceController::class);
        Route::post('service/listing', [ServiceController::class, 'listing'])->name('service.listing')->middleware(['permission:permission_listing']);
        Route::resource('speciality', SpecialityController::class);
        Route::get('speciality/listing', [SpecialityController::class, 'listing'])->name('speciality.listing')->middleware(['permission:speciality_listing']);
        Route::resource('user', UserController::class);
        Route::post('user/listing', [UserController::class, 'listing'])->name('users.listing')->middleware(['permission:user_listing']);;
        Route::resource('roles', RolesController::class);
        Route::post('role/listing', [RolesController::class, 'listing'])->name('roles.listing')->middleware(['permission:roles_listing']);
        Route::resource('permissions', PermissionsController::class);
        Route::post('permissions/listing', [PermissionsController::class, 'listing'])->name('permissions.listing')->middleware(['permission:permission_listing']);
        Route::get('provider/index',[ProviderController::class,'admin_provider_listing'])->name('admin.provider.index')->middleware(['permission:provider_listing']);
        Route::post('provider/index', [ProviderController::class, 'admin_provider_listing'])->name('admin.provider.listing.list')->middleware(['permission:provider_listing']);
        Route::get('provider/listing/status/{id}', [ProviderController::class, 'status'])->name('admin.provider.listing.status')->middleware(['permission:provider_status']);
        Route::get('provider/listing/view/{id}', [ProviderController::class, 'admin_view'])->name('admin.provider.listing.view')->middleware(['permission:provider_view']);
        Route::resource('blog', BlogController::class);
        Route::post('blog/listing', [BlogController::class, 'listing'])->name('blog.listing')->middleware(['permission:blog_listing']);
        Route::get('menu', [MenuController::class,'index'])->name('admin.menu.index');
        Route::get('menu/create', [MenuController::class,'create'])->name('admin.menu.create');
        Route::post('menu/store', [MenuController::class,'store'])->name('admin.menu.store');
        Route::get('menu/edit/{id}', [MenuController::class,'edit'])->name('menu.edit');
        Route::delete('menu/delete/{id}', [MenuController::class,'destroy'])->name('menu.destroy');
        Route::post('menu/listing', [MenuController::class, 'listing'])->name('admin.menu.listing')->middleware(['permission:menu_listing']);
        Route::resource('setting',SettingController::class);
        Route::resource('page',PageController::class);
        Route::post('page/listing', [PageController::class, 'listing'])->name('page.listing')->middleware(['permission:page_listing']);

    });
});
Route::get('register/partner', [PartnerController::class, 'register'])->name('register.partner');
Route::get('user/login', [LoginController::class, 'user_login'])->name('user.login');
Route::get('user/register', [RegisterController::class, 'user_register'])->name('user.register');

// public root
Route::group(['middleware' => ['auth']], function () {
    Route::group(['prefix' => 'user'], function () {
        Route::get('profile', [DashboardController::class, 'user_profile'])->name('user.profile');
    });
    Route::group(['prefix' => 'provider'], function () {
        Route::get('dashboard', [ProviderController::class, 'dashboard'])->name('provider.dashboard');
        Route::get('listing/add', [ProviderController::class, 'add'])->name('provider.listing.add');
        Route::get('listing/form', [ProviderController::class, 'form'])->name('provider.listing.form');
        Route::post('listing/save', [ProviderController::class, 'save'])->name('provider.listing.save');
        Route::get('listing/index', [ProviderController::class, 'index'])->name('provider.listing.index');
        Route::post('listing/list', [ProviderController::class, 'listing'])->name('provider.listing.list');
        Route::get('listing/edit/{listing_id}', [ProviderController::class, 'edit'])->name('provider.listing.edit');
        Route::delete('listing/destroy/{listing_id}', [ProviderController::class, 'destroy'])->name('provider.listing.destroy');

    });
    Route::get('/logout', [DashboardController::class, 'perform'])->name('logout.user');
});
Route::get('get-states', [DashboardController::class, 'get_state'])->name('get.state');
Route::get('get-city', [DashboardController::class, 'get_city'])->name('get.city');
