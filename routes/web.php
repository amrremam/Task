<?php

use App\Http\Controllers\CommentController;
use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

Route::get('/', function () {
    return view('auth.login');
});

Auth::routes();


Route::get('/home',[PostController::class,'index'])->name('home');
Route::post('/comment',[CommentController::class,'store'])->name('comment');
Route::Post('/store',[PostController::class,'store'])->name('store');
Route::post('/image',[PostController::class,'postImage'])->name('image');
Route::get('/soft',[PostController::class,'softDelete'])->name('soft');
Route::get('/force/{id}',[PostController::class,'forceDelete'])->name('force');
Route::get('/restore/{id}',[PostController::class,'restore'])->name('restore');
Route::delete('/destroy/{id}',[PostController::class,'destroy'])->name('destroy');
Route::delete('/destroy/{id}',[CommentController::class,'destroy'])->name('destroy');
