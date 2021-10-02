<?php

use App\Http\Controllers\Posts\ShowPostController;
use App\Http\Controllers\Posts\Trix\AttachmentController;
use Illuminate\Support\Facades\Route;

Route::get('/', fn () => view('index'));

Route::view('/dashboard', 'dashboard')
    ->middleware('auth')
    ->name('dashboard');

Route::view('/two-factor-auth', 'auth.two-factor-auth.index');

Route::get('{slug}', ShowPostController::class)
    ->name('post.show');

/*
 | For adding and removing attachments to a Trix Editor
 */
Route::prefix('trix')->group(function () {
    Route::post('add-attachment', [AttachmentController::class, 'store']);
    Route::post('remove-attachment', [AttachmentController::class, 'destroy']);
});
