<?php

use App\Http\Controllers\PostController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TagController;
use Illuminate\Support\Facades\Route;

Route::redirect('/','post');

Route::redirect('/dashboard','post');

Route::resource('post', PostController::class)->middleware(['auth', 'verified']);
Route::resource('tag', TagController::class)->middleware(['auth', 'verified']);

require __DIR__.'/auth.php';
