<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TopicController;
use App\Http\Controllers\CommentController;

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

require_once 'auth.php';
Route::middleware('auth')->group(function (){
    Route::any('/', [TopicController::class, 'index']);
    Route::resource('topic', TopicController::class);
    Route::get('{commentable_type}/{commentable_id}/comment', [CommentController::class, 'store'])->name('comment.store');
});
