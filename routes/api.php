<?php

use App\Http\Controllers\Api\Auth\AuthController;
use App\Http\Controllers\Api\Auth\RegisterController;
use App\Http\Controllers\Api\CategoryController;
use App\Http\Controllers\Api\SettingController;
use App\Http\Controllers\Api\CityController;
use App\Http\Controllers\Api\GovernorateController;
use App\Http\Controllers\Api\PostController;
use App\Http\Controllers\Api\BloodTypeController;
use App\Http\Controllers\Api\DonationController;
use App\Http\Controllers\Api\ProfileController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::group(['prefix'=> 'clients'],function (){

    Route::middleware('auth')->group(function () {
        Route::post('logout-current-token',[AuthController::class,'logoutCurrentToken']);
        Route::post('logout-all-tokens',[AuthController::class,'logoutAllTokens']);
        Route::get('contuct-us',[SettingController::class,'contactUs']);
        Route::get('notification-settings',[SettingController::class,'getNotificationSetting']);
        Route::post('set-notification-settings',[SettingController::class,'setNotificationSetting']);
        Route::post('contuct-us-request',[SettingController::class,'contactUsRequest']);
        Route::get('profile',[ProfileController::class,'getProfile']);
        Route::post('update-profile',[ProfileController::class,'updateProfile']);
        Route::get('all-posts',[PostController::class,'allPosts']);
        Route::get('post',[PostController::class,'post']);
        Route::get('favorites',[PostController::class,'listFavoritePosts']);
        Route::post('favorites',[PostController::class,'toggleFavoritePosts']);
        Route::post('create-donation',[DonationController::class,'createDonation']);
        Route::get('all-donations',[DonationController::class,'allDonationRequests']);
        Route::get('donation',[DonationController::class,'getDonationRequest']);
        Route::get('register-token',[AuthController::class,'registerToken']);
    });
    Route::get('categories',[CategoryController::class,'allCategories']);
    Route::get('cities',[CityController::class,'allCities']);
    Route::get('governorates',[GovernorateController::class,'AllGovernorates']);
    Route::get('blood-types',[BloodTypeController::class,'allBloodTypes']);
    Route::post('register',[RegisterController::class,'register']);
    Route::post('login',[AuthController::class,'login']);
    Route::post('reset-password',[AuthController::class,'resetPassword']);
    Route::post('new-password',[AuthController::class,'newPassword']);


});
