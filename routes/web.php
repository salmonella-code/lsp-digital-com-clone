<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\BannerController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ImageControlller;
use App\Http\Controllers\MediaController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SkemaController;
use App\Http\Controllers\SkemaPlaceController;
use App\Http\Controllers\user\HomeController as UserHomeController;
use App\Http\Controllers\user\PlaceController;
use App\Http\Controllers\user\ProfileController as UserProfileController;
use App\Http\Controllers\user\SkemaController as UserSkemaController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;


Route::get('/', [UserHomeController::class, 'index']);

Route::get('login', [AuthController::class, 'showFormLogin'])->name('login');
Route::post('login', [AuthController::class, 'login'])->name('post.login');

Route::group(['middleware' => 'auth'], function () {
    Route::get('logout', [AuthController::class, 'logout'])->name('logout');
    Route::get('home', [HomeController::class, 'index'])->name('home');

    // user
    Route::get('user', [UserController::class, 'index'])->name('user.index');
    Route::post('user', [UserController::class, 'store'])->name('user.store');
    Route::get('user/{id}', [UserController::class, 'edit'])->name('user.edit');
    Route::put('user/update', [UserController::class, 'update'])->name('user.update');
    Route::get('user/{id}/delete', [UserController::class, 'destroy'])->name('user.destroy');
    // end user

    // banner
    Route::get('banner', [BannerController::class, 'index'])->name('banner.index');
    Route::post('banner', [BannerController::class, 'store'])->name('banner.store');
    Route::get('banner/{id}', [BannerController::class, 'edit'])->name('banner.edit');
    Route::put('banner/update', [BannerController::class, 'update'])->name('banner.update');
    Route::get('banner/{id}/banner', [BannerController::class, 'destroy'])->name('banner.destroy');
    // end banner

    // profile
    Route::get('profile', [ProfileController::class, 'index'])->name('profile.index');
    Route::get('profile/create', [ProfileController::class, 'create'])->name('profile.create');
    Route::post('profile', [ProfileController::class, 'store'])->name('profile.store');
    Route::get('profile/{id}', [ProfileController::class, 'show'])->name('profile.show');
    Route::get('profile/{id}/edit', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::put('profile/{id}/update', [ProfileController::class, 'update'])->name('profile.update');
    Route::get('profile/{id}/destroy', [ProfileController::class, 'destroy'])->name('profile.destroy');
    // end profile

    // skema
    Route::get('skema', [SkemaController::class, 'index'])->name('skema.index');
    Route::get('skema/create', [SkemaController::class, 'create'])->name('skema.create');
    Route::post('skema/store', [SkemaController::class, 'store'])->name('skema.store');
    Route::get('skema/{id}/show', [SkemaController::class, 'show'])->name('skema.show');
    Route::get('skema/{id}/edit', [SkemaController::class, 'edit'])->name('skema.edit');
    Route::put('skema/{id}/update', [SkemaController::class, 'update'])->name('skema.update');
    Route::get('skema/{id}/destroy', [SkemaController::class, 'destroy'])->name('skema.destroy');
    // end skema

    // place
    Route::get('place', [SkemaPlaceController::class, 'index'])->name('place.index');
    Route::get('place/create', [SkemaPlaceController::class, 'create'])->name('place.create');
    Route::post('place/store', [SkemaPlaceController::class, 'store'])->name('place.store');
    Route::get('place/{id}', [SkemaPlaceController::class, 'show'])->name('place.show');
    Route::get('place/{id}/destroy', [SkemaPlaceController::class, 'destroy'])->name('place.destroy');
    // end place

    // media
    Route::get('media', [MediaController::class, 'index'])->name('media.index');
    Route::post('media', [MediaController::class, 'store'])->name('media.store');
    Route::get('media/{id}', [MediaController::class, 'edit'])->name('media.edit');
    Route::put('media/update', [MediaController::class, 'update'])->name('media.update');
    Route::get('media/{id}/destroy', [MediaController::class, 'destroy'])->name('media.destroy');
    // end media

    // image upload
    Route::post('image', [ImageControlller::class, 'store'])->name('image.store');
    // end image upload
});


Route::get('profiles/{id}', [UserProfileController::class, 'index'])->name('user.profile.index');

// skema
Route::get('skemas', [UserSkemaController::class, 'index'])->name('user.skema.index');
Route::get('skemas/{id}', [UserSkemaController::class, 'show'])->name('user.skema.show');
// end skema

// place
Route::get('places', [PlaceController::class, 'index'])->name('user.place.index');
Route::get('places/{id}', [PlaceController::class, 'show'])->name('user.place.show');
// end place