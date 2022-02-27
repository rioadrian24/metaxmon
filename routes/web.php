<?php

use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Front\HomeController;
use App\Http\Controllers\Manage\BannerSettingController;
use App\Http\Controllers\Manage\ContactController;
use App\Http\Controllers\Manage\DashboardController;
use App\Http\Controllers\Manage\NftController;
use App\Http\Controllers\Manage\RoadMapController;
use App\Http\Controllers\Manage\UserController;
use App\Http\Controllers\Manage\WorkController;
use App\Http\Controllers\Manage\WorkDescriptionController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/auth/signin', [AuthController::class, 'signin'])->name('login');
Route::post('/auth/signin/post', [AuthController::class, 'post_signin'])->name('signin.post');
Route::get('/auth/signout', [AuthController::class, 'signout'])->name('signout');

Route::prefix('admin')->middleware(['web', 'auth'])->group(function () {
    // dashboard
    Route::get('/', [DashboardController::class, 'index'])->name('admin.dashboard');
    // user password
    Route::get('password', [UserController::class, 'password'])->name('user.password');
    Route::patch('password/update/{user}', [UserController::class, 'update_password'])->name('user.password.update');

    // user profile
    Route::get('profile', [UserController::class, 'profile'])->name('user.profile');
    Route::patch('profile/update/{user}', [UserController::class, 'update_profile'])->name('user.profile.update');

    // user
    Route::resource('user', UserController::class);
    Route::get('/user/{user}/restore', [UserController::class, 'restore'])->name('user.restore');
    Route::delete('/user/{user}/force_destroy', [UserController::class, 'forceDestroy'])->name('user.destroy.force');
    Route::post('/user/destroy_all', [UserController::class, 'destroyAll'])->name('user.destroy.all');

    Route::resource('banner', BannerSettingController::class);
    Route::resource('roadmaps', RoadMapController::class);
    Route::resource('works', WorkController::class);
    Route::resource('work-description', WorkDescriptionController::class);
    Route::resource('contacts', ContactController::class);
    Route::resource('nfts', NftController::class);
});