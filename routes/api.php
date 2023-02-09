<?php

use App\Http\Controllers\Api\Auth\AuthController;
use App\Http\Controllers\Api\Auth\LoginController;
use App\Http\Controllers\Api\Auth\RegisterController;
use App\Http\Controllers\Api\CategoryController;
use App\Http\Controllers\Api\SettingController;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group(['prefix'=> 'clients'],function (){
    Route::get('categories',[CategoryController::class,'index']);
    Route::get('cities',[CategoryController::class,'index']);
    Route::get('governorates',[CategoryController::class,'index']);
    Route::get('blood-types',[CategoryController::class,'index']);
    Route::post('register',[RegisterController::class,'register']);
    Route::post('login',[AuthController::class,'login']);
    Route::post('logout-current-token',[AuthController::class,'logoutCurrentToken']);
    Route::post('logout-specific-token',[AuthController::class,'logoutSpecificToken']);
    Route::post('logout-all-tokens',[AuthController::class,'logoutAllTokens']);
    Route::get('contuct-us',[SettingController::class,'contactUs']);
    Route::get('notification-settings',[SettingController::class,'notificationSetting']);
});
