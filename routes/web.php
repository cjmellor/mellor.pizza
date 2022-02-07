<?php

use App\Http\Controllers\AttachmentController;
use App\Http\Controllers\BlogIndexController;
use App\Http\Controllers\Posts\ShowPostController;
use Illuminate\Support\Facades\Route;

Route::view('/', 'index')->name('homepage');

Route::view('/about', 'about')->name('about');

Route::view('/two-factor-auth', 'auth.two-factor-auth.index')->name('two-factor-auth');

Route::get('/blog', BlogIndexController::class)->name('blog');

Route::get('{slug}', ShowPostController::class)->name('post.show');

/*
 | For adding and removing attachments to an Editor
 */
Route::prefix('attachments')->group(function () {
    Route::post('add-attachment', AttachmentController::class);
});
