<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class WeatherController extends Controller
{
    public function getWeather($place)
    {
        // $apiKey = '888ec30639884a8bbd494910241911';
        // $response = Http::get("http://api.weatherapi.com/v1/current.json?key={$apiKey}&q={$place}");
        // return $response->json();
    }
}