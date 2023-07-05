<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Orders</title>
    @vite('resources/css/app.css')
</head>

<body class="h-screen w-screen overflow-hidden flex justify-center items-center">
    <div class="container bg-gray-50 m-2 p-5 rounded shadow h-5/6 flex flex-col">
        <h1 class="text-xl font-bold py-4">Orders</h1>
        <a href="{{ url('create_order') }}" class="bg-blue-700 rounded cursor-pointer p-2 text-white inline-block">Add a
            new order</a>
        @if (count($orders) > 0)
            <div class="flex flex-col my-2 overflow-y-scroll flex-1">
                @foreach ($orders as $order)
                    <div class="flex flex-col border border-gray-300 p-2 rounded my-2 me-2">
                        <h1 class="text-xl font-bold">Order #{{ $order->order_number }}</h1>
                        <h2 class="text-lg font-bold">Size: {{ $order->size }}</h2>
                        <h2 class="text-lg font-bold">Toppings: {{ $order->toppings }}</h2>
                        <h2 class="text-lg font-bold">Price: {{ $order->price }}€</h2>
                    </div>
                @endforeach
            </div>
        @else
            <h1 class="my-4">No orders found</h1>
        @endif
    </div>
</body>

</html>
