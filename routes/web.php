<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AppController;
use App\Http\Controllers\Home\HomeSliderController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\DataController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('admin.index');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Admin All Route
Route::middleware('auth')->group(function () {
    Route::get('/admin/logout', [AdminController::class, 'destroy'])->name('admin.logout');
    Route::get('/admin/profile', [AdminController::class, 'Profile'])->name('admin.profile');
    Route::get('/edit/profile', [AdminController::class, 'EditProfile'])->name('edit.profile');
    Route::post('/store/profile', [AdminController::class, 'StoreProfile'])->name('store.profile');

    Route::get('/change/password', [AdminController::class, 'ChangePassword'])->name('change.password');
    Route::post('/update/password', [AdminController::class, 'UpdatePassword'])->name('update.password');
});

// HomeSlide All Route
Route::middleware('auth')->group(function () {
    Route::get('/home/slide', [HomeSliderController::class, 'HomeSlider'])->name('home.slide');
    Route::post('/update/slider', [HomeSliderController::class, 'UpdateSlider'])->name('update.slider');
});

// Book Controller
Route::middleware('auth')->group(function () {
    Route::get('/book', [BookController::class, 'book'])->name('book');
    Route::post('/create', [BookController::class, 'create'])->name('create');
});

// Get Data
Route::middleware('auth')->group(function () {
    Route::get('/book', [DataController::class, 'index'])->name('book');
    Route::get('/findField', [DataController::class, 'getField'])->name('findField');
    Route::get('/findPrice', [DataController::class, 'getPrice'])->name('findPrice');
    Route::get('/getAvailableFields', [DataController::class, 'getAvailableFields'])->name('getAvailableFields');
});

// App Controller
Route::middleware('auth')->group(function () {
    Route::get('/dashboard', [AppController::class, 'display'])->name('dashboard');
});



require __DIR__ . '/auth.php';
