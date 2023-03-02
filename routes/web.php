<?php

use App\Http\Controllers\Dashboard\CategoryController;
use App\Http\Controllers\Dashboard\CityController;
use App\Http\Controllers\Dashboard\ClientController;
use App\Http\Controllers\Dashboard\DashboardController;
use App\Http\Controllers\Dashboard\GovernorateController;
use App\Http\Controllers\Dashboard\PostController;
use App\Models\CommunicationRequest;
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

Route::get('/', function () {
    return view('welcome');
});
Auth::routes([
    'register' => false
]);
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::group([
    'prefix' => 'dashboard',
],function(){
    Route::get('/',[DashboardController::class,'index'])->name('dashboard.index');
    Route::resource('governorates',GovernorateController::class);
    Route::resource('cities',CityController::class);
    Route::resource('categories',CategoryController::class);
    Route::resource('posts',PostController::class);
    Route::resource('clients',ClientController::class)->only('index','destroy','edit');
    Route::get('clients/status',[ClientController::class,'changeStatus'])->name('clients.status');
    Route::resource('contacts',CommunicationRequest::class)->only('index','destroy');


});






