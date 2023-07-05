<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;

class FormController extends Controller
{
    public function create(): View
    {
        $toppings = DB::table('toppings')->get();
        return view('create_order', compact('toppings'));
    }

    public function store(Request $request): RedirectResponse
    {
        $data = $request->all();
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

        $data['toppings'] = implode(", ", $toppings);

        DB::table('orders')->insert([
            'size' => $data['size'],
            'toppings' => $data['toppings'],
            'price' => $price
        ]);

        return redirect('/');
    }
}