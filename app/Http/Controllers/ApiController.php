<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class ApiController extends Controller
{
    public function checkLink($userInput)
    {
        $url = "https://opencorporates.al/sq/nipt/{$userInput}";
        $response = Http::get($url);

        if ($response->successful()) {
            return response()->json(['exists' => true]);
        } else {
            return response()->json(['exists' => false]);
        }
    }
}