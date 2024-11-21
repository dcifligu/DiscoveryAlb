<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WeatherController;
use App\Http\Controllers\ApiController;


Route::get('/', function () {
    return view('welcome');
});

Route::get('/weather/{place}', [WeatherController::class, 'getWeather']);
Route::get('/check-link/{userInput}', [ApiController::class, 'checkLink']);