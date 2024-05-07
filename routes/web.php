<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\Home\AboutPageController;
use App\Http\Controllers\Home\HomeSliderController;
use App\Http\Controllers\ProfileController;
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
    return view('frontend.index');
})->name('home');
Route::get('/about', function () {
    return view('frontend.about');
})->name('about');

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/dashboard', function(){
        return view('admin.index');
    })->name('dashboard');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    
    // All Routes of Admin
    Route::get('/logout', [AdminController::class, 'destroy'])->name('admin.logout');
    Route::get('/profile', [AdminController::class, 'profile'])->name('admin.profile');
    Route::get('/profile/edit', [AdminController::class, 'profile_edit'])->name('profile.edit');
    Route::post('/profile/store', [AdminController::class, 'profile_store'])->name('profile.store');
    Route::get('/profile/change_pwd', [AdminController::class, 'change_pwd'])->name('admin.change_pwd');
    Route::post('/profile/change_pwd', [AdminController::class, 'change_pwd_store'])->name('admin.change_pwd');

    // Home Slider Routes
    Route::get('admin/home_slides', [HomeSliderController::class, 'home_slider'])->name('admin.home_slider');
    Route::post('admin/home_slides', [HomeSliderController::class, 'home_slider_update'])->name('admin.home_slider_update');
    // Home Slider Routes
    Route::get('admin/about_page', [AboutPageController::class, 'about_page'])->name('admin.about_page');
    Route::post('admin/about_page', [AboutPageController::class, 'about_page_update'])->name('admin.about_page_update');
});    


// // Home Slide Routes
// Route::controller(HomeSliderController::class)->group(function(){
    
// });



require __DIR__.'/auth.php';
