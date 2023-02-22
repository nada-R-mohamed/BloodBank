<?php

use App\Http\Controllers\Dashboard\DashboardController;
use App\Http\Controllers\Dashboard\GovernorateController;
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

Route::group([
    'prefix' => 'dashboard',
//    'as' => 'dashboard.'
],function(){
    Route::get('/',[DashboardController::class,'index'])->name('index');
    Route::resource('governorates',GovernorateController::class);
//    Route::get('governorates/create',[GovernorateController::class,'create'])->name('governorates.create');
//    Route::post('governorates/store',[GovernorateController::class,'store'])->name('governorates.store');

});



Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
