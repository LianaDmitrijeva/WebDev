<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\FeedController;
use App\Http\Controllers\GoogleAuthController;
use App\Http\Controllers\WelcomeController;

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

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/', [WelcomeController::class, 'index'])->name('welcome');
// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

/***************************************************************************************************/
Route::get('/home', [HomeController::class, 'index'])->middleware('auth')->name('home');
/***************************************************************************************************/

//Continue with Google button
Route::get('auth/google', [GoogleAuthController::class, 'redirect'])->name('google-auth');
Route::get('auth/google/call-back', [GoogleAuthController::class, 'callbackGoogle']);

//Page "feed"
Route::get('/feed', [FeedController::class, 'index'])->middleware('auth')->name('feed');
Route::get('view/{post}', [FeedController::class, 'show'])->name('show');

//Page: 'home' //my posts
Route::get('/myposts', [HomeController::class, 'index'])->name('myposts');

Route::get('/create', [HomeController::class, 'create'])->name('create');
Route::get('view/{post}', [HomeController::class, 'show'])->name('show');
Route::get('edit/{post}', [HomeController::class, 'edit'])->name('edit');
Route::put('edit/{post}',[HomeController::class, 'update'])->name('update');
Route::delete('/{post}',[HomeController::class, 'destroy'])->name('destroy');
Route::post('store/', [HomeController::class, 'store'])->name('store');

//////////////
Route::get('/wishlist', [WishlistController::class, 'index'])->middleware('auth')->name('wishlist');

///////////////
Route::get('/myposts/search', [HomeController::class, 'search'])->name('search');
