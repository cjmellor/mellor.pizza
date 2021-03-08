<?php

use App\Http\Controllers\Fos\PostController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes for FOS (Fortress of Solitude)
|--------------------------------------------------------------------------
|
| Registered web routes for the admin backend
|
*/

Route::middleware('auth')->group(function () {
    Route::view('/', 'fos.index');

    Route::resource('posts', PostController::class);
});
