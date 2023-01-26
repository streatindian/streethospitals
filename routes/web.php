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

Route::get('/', function () {
    return view('welcome');
});

// user root
Route::group(['prefix' => 'admin'], function () {
    Auth::routes();
    Route::group(['middleware' => ['auth']], function () {
        Route::get('/home', [HomeController::class, 'index'])->name('home');
        Route::resource('category', CategoryController::class);
        Route::resource('service', ServiceController::class);
        Route::post('service/listing', [ServiceController::class, 'listing'])->name('service.listing');
        Route::resource('speciality', SpecialityController::class);
        Route::get('speciality/listing', [SpecialityController::class, 'listing'])->name('speciality.listing');
        Route::resource('user', UserController::class);
        Route::post('user/listing', [UserController::class, 'listing'])->name('users.listing');
        Route::resource('roles', RolesController::class);
        Route::post('role/listing', [RolesController::class, 'listing'])->name('roles.listing');
        Route::resource('permissions', PermissionsController::class);
        Route::post('permissions/listing', [PermissionsController::class, 'listing'])->name('permissions.listing');
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
        
    });
    Route::get('/logout', [HomeController::class, 'perform'])->name('logout.perform');
});
Route::get('get-states', [HomeController::class, 'get_state'])->name('get.state');
Route::get('get-city', [HomeController::class, 'get_city'])->name('get.city');
