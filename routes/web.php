<?php

use App\Http\Controllers\Admin;
use App\Http\Controllers\Frontend;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Frontend Routes
|--------------------------------------------------------------------------
*/

Route::get('/', [Frontend\HomeController::class, 'index'])->name('home');
Route::get('/about', [Frontend\HomeController::class, 'about'])->name('about');

Route::get('/programs', [Frontend\ProgramController::class, 'index'])->name('programs.index');
Route::get('/programs/{slug}', [Frontend\ProgramController::class, 'show'])->name('programs.show');

Route::get('/blogs', [Frontend\BlogController::class, 'index'])->name('blogs.index');
Route::get('/blogs/{slug}', [Frontend\BlogController::class, 'show'])->name('blogs.show');

Route::get('/gallery', [Frontend\GalleryController::class, 'index'])->name('gallery');

Route::get('/contact', [Frontend\ContactController::class, 'index'])->name('contact');
Route::post('/contact', [Frontend\ContactController::class, 'store'])->name('contact.store');

/*
|--------------------------------------------------------------------------
| Admin Auth Routes
|--------------------------------------------------------------------------
*/

Route::prefix('admin')->group(function () {
    Route::middleware('admin.guest')->group(function () {
        Route::get('/login', [Admin\AuthController::class, 'showLogin'])->name('admin.login');
        Route::post('/login', [Admin\AuthController::class, 'login'])->name('admin.login.submit');
    });

    Route::middleware('admin.auth')->group(function () {
        Route::post('/logout', [Admin\AuthController::class, 'logout'])->name('admin.logout');
        Route::get('/', [Admin\DashboardController::class, 'index'])->name('admin.dashboard');

        // Settings
        Route::get('settings', [Admin\SettingsController::class, 'index'])->name('admin.settings.edit');
        Route::put('settings', [Admin\SettingsController::class, 'update'])->name('admin.settings.update');

        // Banners
        Route::resource('banners', Admin\BannerController::class)->names('admin.banners');

        // Categories
        Route::resource('categories', Admin\CategoryController::class)->names('admin.categories');

        // Programs
        Route::resource('programs', Admin\ProgramController::class)->names('admin.programs');
        Route::delete('program-images/{image}', [Admin\ProgramController::class, 'deleteImage'])->name('admin.programs.deleteImage');

        // Blogs
        Route::resource('blogs', Admin\BlogController::class)->names('admin.blogs');

        // Gallery
        Route::get('gallery', [Admin\GalleryController::class, 'index'])->name('admin.gallery.index');
        Route::get('gallery/create', [Admin\GalleryController::class, 'create'])->name('admin.gallery.create');
        Route::post('gallery', [Admin\GalleryController::class, 'store'])->name('admin.gallery.store');
        Route::delete('gallery/{gallery}', [Admin\GalleryController::class, 'destroy'])->name('admin.gallery.destroy');

        // Contacts / Enquiries
        Route::get('contacts', [Admin\ContactController::class, 'index'])->name('admin.contacts.index');
        Route::get('contacts/{contact}', [Admin\ContactController::class, 'show'])->name('admin.contacts.show');
        Route::delete('contacts/{contact}', [Admin\ContactController::class, 'destroy'])->name('admin.contacts.destroy');
        Route::patch('contacts/{contact}/toggle-read', [Admin\ContactController::class, 'toggleRead'])->name('admin.contacts.toggleRead');
    });
});
