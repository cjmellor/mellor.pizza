<?php

use App\Http\Controllers\Fos\Post\PostController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes for FOS (Fortress of Solitude)
|--------------------------------------------------------------------------
|
| Registered web routes for the admin backend
|
*/

Route::middleware(['auth', 'can:is-god'])->group(function () {
    Route::view('/', 'fos.index')->name('fos.index');

    Route::name('fos.')->group(
        function () {
            return Route::resource('posts', PostController::class);
        }
    );
});
