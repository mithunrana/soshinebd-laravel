<?php

use App\Http\Controllers\UserDataController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::post('/register', [UserDataController::class, 'register']);
Route::post('/login', [UserDataController::class, 'login']);
Route::get('/slider', [UserDataController::class, 'sliderList']);
Route::get('/recentproducts', [UserDataController::class, 'recentProducts']);
Route::get('/fewhdcamera', [UserDataController::class, 'fewHDCamera']);
Route::get('/fewipcamera', [UserDataController::class, 'fewIPCamera']);
Route::get('/fewdvr', [UserDataController::class, 'fewDVR']);
Route::get('/fewnvr', [UserDataController::class, 'fewNVR']);
Route::get('/discoverproducts', [UserDataController::class, 'discoverProducts']);
Route::get('/discoverproductslist/{id}', [UserDataController::class, 'discoverProductsList']);


Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
