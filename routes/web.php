<?php

use App\Http\Controllers\FormController;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    $orders = DB::table('orders')->get();
    return view("orders", compact('orders'));
});

Route::get('/create_order', [FormController::class, 'create']);
Route::post('/create_order', [FormController::class, 'store']);