<?php

use App\Http\Controllers\Fos\IndexController;
use App\Http\Controllers\Fos\Post\PostController;
use App\Http\Controllers\Fos\Post\PreviewController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes for FOS (Fortress of Solitude)
|--------------------------------------------------------------------------
|
| Registered web routes for the admin backend
|
*/

Route::name('fos.')->middleware(['auth', 'can:is-god'])->group(function () {
    // TODO: Switch to `can` method via v8.70 - https://laracasts.com/series/jeffreys-larabits/episodes/14
    Route::get(uri: '/', action: IndexController::class)->name('fos.index');
    Route::get('preview/{post}', PreviewController::class)->name('preview');
    Route::resource('posts', PostController::class)->except(['index']);
});
