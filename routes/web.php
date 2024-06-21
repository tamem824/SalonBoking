<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ServicesController;
use App\Http\Controllers\SitingController;
use App\Http\Controllers\AboutUsController;
use App\Http\Controllers\BokingController;

Route::resource('users'  , UserController::class);
Route::resource('services', ServicesController::class);
Route::resource('sitings', SitingController::class);
Route::resource('aboutus', AboutUsController::class);
Route::resource('bokings', BokingController::class);


Route::get('/', function () {
    return view('welcome');
});
