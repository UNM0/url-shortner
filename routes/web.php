<?php

use App\Http\Controllers\UrlController;
use Illuminate\Support\Facades\Route;
use App\Http\Middleware\TestMiddleware;
// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/login', function () {
    return view('backend.partials.login');
});

Route::get('/', [UrlController::class, 'welcome'])->name('fast_url.welcome');
Route::get('/links', [UrlController::class, 'links'])->name('fast_url.links');
Route::get('/create', [UrlController::class, 'create'])->name('fast_url.create');
Route::post('/create', [UrlController::class, 'store']);
Route::get('/edit/{id}', [UrlController::class, 'edit'])->name('fast_url.edit');
Route::post('/edit/{id}', [UrlController::class, 'update']);
Route::post('/delete/{id}', [UrlController::class, 'destroy'])->name('fast_url.delete');
Route::get('/{shortenedUrl}', [UrlController::class, 'redirect'])->name('fast_url.redirect');
