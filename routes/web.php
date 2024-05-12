<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Home\BlogController;
use App\Http\Controllers\Home\AboutPageController;
use App\Http\Controllers\Home\PortfolioController;
use App\Http\Controllers\Home\HomeSliderController;
use App\Http\Controllers\Home\BlogCategoryController;

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


// Routes for Frontend
Route::get('/', function () {
    return view('frontend.index');
})->name('home');
Route::get('/about', function () {
    return view('frontend.about');
})->name('about');
Route::get('/portfolio/{id}', [PortfolioController::class, 'show_portfolio'])->name('single_portfolio');


// Routes for Backend/Dashboard
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

    // About Section Routes
    Route::get('admin/about_page', [AboutPageController::class, 'about_page'])->name('admin.about_page');
    Route::post('admin/about_page', [AboutPageController::class, 'about_page_update'])->name('admin.about_page_update');
    Route::get('admin/about_multi_image', [AboutPageController::class, 'about_multi_image'])->name('admin.about_multi_image');
    Route::post('admin/about_multi_image', [AboutPageController::class, 'about_multi_image_update'])->name('admin.about_multi_image_update');

    // Route::get('admin/about_multi_image/edit/{id}', [AboutPageController::class, 'image_edit'])->name('admin.image_edit');
    Route::get('admin/about_multi_image/delete/{id}', [AboutPageController::class, 'image_delete'])->name('admin.image_delete');


    // Portfolio Section Routes
    Route::get('admin/all_portfolio', [PortfolioController::class, 'portfolio_page'])->name('admin.portfolio_page');
    Route::post('admin/add_portfolio', [PortfolioController::class, 'store_portfolio'])->name('admin.add_portfolio');
    Route::get('admin/edit_portfolio/{id}', [PortfolioController::class, 'edit_portfolio'])->name('admin.edit_portfolio');
    Route::post('admin/edit_portfolio/{id}', [PortfolioController::class, 'update_portfolio'])->name('admin.update_portfolio');
    Route::get('admin/delete_portfolio/{id}', [PortfolioController::class, 'delete_portfolio'])->name('admin.delete_portfolio');

    // Blog section Routes
    Route::get('admin/blog/category', [BlogCategoryController::class, 'blog_category'])->name('admin.blog_category');
    Route::post('admin/blog/add_category', [BlogCategoryController::class, 'store_blog_category'])->name('admin.add_blog_category');
    Route::get('admin/blog/edit_category/{id}', [BlogCategoryController::class, 'edit_blog_category'])->name('admin.edit_blog_category');
    Route::post('admin/blog/edit_category/{id}', [BlogCategoryController::class, 'update_blog_category'])->name('admin.update_blog_category');
    Route::get('admin/blog/delete_category/{id}', [BlogCategoryController::class, 'destroy_blog_category'])->name('admin.delete_blog_category');

    Route::resource('admin/blog', BlogController::class)->except(['create','show', 'destroy']);
    Route::get('admin/blog_delete/{id}', [BlogController::class , 'destroy'])->name('admin.delete_blog');

});    




require __DIR__.'/auth.php';
