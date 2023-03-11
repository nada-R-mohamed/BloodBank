<?php

use App\Http\Controllers\Front\AuthController;
use App\Http\Controllers\Front\FrontController;
use App\Http\Controllers\Front\PostController;
use Illuminate\Support\Facades\Route;

Route::get('/',[FrontController::class,'home'])->name('home');

Route::get('article-details/{id}',[PostController::class,'postDetails'])->name('article-details');
Route::get('all-posts',[PostController::class,'index'])->name('posts.index');
Route::get('register',[AuthController::class,'showRegister'])->name('register');
