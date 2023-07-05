<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::post('/calculate_price', function (Request $r) {
    $data = $r->all();
    $toppings = array_filter($data, function ($key) {
        return strpos($key, 'toppings') === 0;
    }, ARRAY_FILTER_USE_KEY);
    $price = 0;
    if ($data["size"] == "Small") {
        $price = 8;
    } else if ($data["size"] == "Medium") {
        $price = 10;
    } else if ($data["size"] == "Large") {
        $price = 12;
    }
    if (count($toppings) > 0) {
        $toppings = $toppings["toppings"];
        $price += count($toppings);
        if (count($toppings) > 3) {
            $price *= 0.9;
        }
    }
    return response()->json([
        'price' => round($price, 2)
    ]);
});