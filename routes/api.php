<?php

use App\Http\Controllers\UserDataController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::post('/register', [UserDataController::class, 'register']);
Route::post('/login', [UserDataController::class, 'login']);
Route::get('/slider', [UserDataController::class, 'sliderList']);
Route::get('/recentproducts', [UserDataController::class, 'recentProducts']);



Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
