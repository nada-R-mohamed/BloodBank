<?php

use App\Http\Controllers\Front\Auth\LoginController;
use App\Http\Controllers\Front\Auth\ProfileController;
use App\Http\Controllers\Front\Auth\RegisterController;
use App\Http\Controllers\Front\DonationRequestController;
use App\Http\Controllers\Front\FrontController;
use App\Http\Controllers\Front\PostController;
use Illuminate\Support\Facades\Route;


Route::group(['prefix' => 'front'],function () {
    Route::get('/',[FrontController::class,'home'])->name('home');
    Route::get('/about-us',[FrontController::class,'aboutUs'])->name('about-us');
    Route::get('/article-details/{id}',[PostController::class,'postDetails'])->name('article-details');
    Route::get('/all-posts',[PostController::class,'index'])->name('posts.index');
    Route::get('/register',[RegisterController::class,'create'])->name('register.create');
    Route::post('/register',[RegisterController::class,'store'])->name('register.store');
    Route::get('/login',[LoginController::class,'index'])->name('front.login');
    Route::post('/login',[LoginController::class,'login'])->name('login.store');
    Route::get('/profile',[ProfileController::class,'index'])->name('profile.index');
    Route::get('/donation-requests',[DonationRequestController::class,'index'])->name('donations.index');
    Route::get('/donation-request/details/{$id}',[DonationRequestController::class,'donationDetails'])->name('donation.details');
    Route::get('/contact-us',[FrontController::class,'contactUs'])->name('contact-us');
});

