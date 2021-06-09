<?php

use App\Http\Controllers\BlogPostController;
use App\Http\Controllers\Trix\AttachmentController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::view('/', 'index');
Route::get('{slug}', BlogPostController::class);

Route::view('/dashboard', 'dashboard')
    ->middleware('auth')
    ->name('dashboard');

Route::view('/two-factor-auth', 'auth.two-factor-auth.index');

/*
 | For adding and removing attachments to a Trix Editor
 */
Route::prefix('trix')->group(function () {
    Route::post('add-attachment', [AttachmentController::class, 'store']);
    Route::post('remove-attachment', [AttachmentController::class, 'destroy']);
});
