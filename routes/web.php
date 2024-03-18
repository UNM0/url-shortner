<?php

use App\Http\Controllers\AuthenticationController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\FileController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UrlController;
use Illuminate\Support\Facades\Route;

Route::get('/signup', [AuthenticationController::class, 'signup_form'])->name('signup');

// Route to sign in new user
Route::post('/signup', [AuthenticationController::class, 'signup']);

// Route to access login page
Route::get('/login', [AuthenticationController::class, 'login_form'])->name('login');

//Route to login authenticated user
Route::post('/login', [AuthenticationController::class, 'login']);

// Route for logout
Route::post('/logout', [AuthenticationController::class, 'logout'])->name('logout');

//  File upload
Route::get('/upload', [FileController::class, 'upload_page'])->name('upload');
// file validation
Route::post('/upload', [FileController::class, 'upload']);

// prefix admin and attatch middleware to protect route against un-authenticated users
Route::group(['middleware' => 'auth', 'prefix' => 'admin'], function () {

    // Routes for home page
    Route::get('/home', [UrlController::class, 'welcome'])->name('fast_url.welcome');

    // Routes to create short url links
    Route::get('/create', [UrlController::class, 'create'])->name('fast_url.create');

    // Route to store the link in database
    Route::post('/create', [UrlController::class, 'store']);

    // Route to edit the specified url link
    Route::get('/edit/{id}', [UrlController::class, 'edit'])->name('fast_url.edit');

    // Route to update the edited url link
    Route::post('/edit/{id}', [UrlController::class, 'update']);

    // Route to delete the selected url link
    Route::post('/delete/{id}', [UrlController::class, 'destroy'])->name('fast_url.destroy');

    // Routes for view links
    Route::get('/links', [UrlController::class, 'links'])->name('fast_url.links');

    // Routes for view analytics
    Route::get('/analyze/{id}', [UrlController::class, 'analyze'])->name('fast_url.analyze');

    // Routes for contact page
    Route::get('/contact', [ContactController::class, 'contact'])->name('fast_url.contact');

    // Routes for user profiles settings
    Route::get('/profile-setting', [ProfileController::class, 'index'])->name('fast_url.setting');
});
// Routes for short URLs
Route::get('/{shortenedUrl}', [UrlController::class, 'redirect'])->name('fast_url.redirect');
