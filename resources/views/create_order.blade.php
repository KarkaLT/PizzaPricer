<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create order</title>
    @vite('resources/css/app.css')

    <script>
        const calculatePrice = async (form) => {
            const data = new FormData(form);
            const response = await fetch('./api/calculate_price', {
                method: 'POST',
                body: data
            });
            const result = await response.json();
            document.getElementById('price').innerHTML = result.price;
        }
    </script>
</head>

<body class="h-screen w-screen flex justify-center items-center overflow-hidden">
    <div class="container bg-gray-50 m-2 p-5 rounded shadow h-5/6 flex flex-col">
        <h1 class="text-xl font-bold py-4">Add order</h1>
        <form class="flex flex-col flex-1 overflow-hidden" action="{{ url('/create_order') }}" method="post"
            onchange="calculatePrice(this)">
            @csrf
            <div class="flex flex-col">
                <label for="size">Size</label>
                <select name="size" id="size" class="border border-gray-300 p-2 rounded">
                    <option value="Small" selected>Small</option>
                    <option value="Medium">Medium</option>
                    <option value="Large">Large</option>
                </select>
            </div>
            <div class="flex flex-col flex-1">
                <label for="toppings">Toppings</label>
                <div class="flex flex-col flex-1 basis-0 overflow-y-scroll">
                    @foreach ($toppings as $topping)
                        <div class="flex flex-row">
                            <input type="checkbox" name="toppings[{{ $topping->id }}]" id="{{ $topping->id }}"
                                value="{{ $topping->name }}" class="border border-gray-300 p-2 rounded">
                            <label class="ms-1" for="{{ $topping->id }}">{{ $topping->name }}</label>
                        </div>
                    @endforeach
                </div>
            </div>
            <h1 class="text-xl font-bold">Price: <span id="price">8</span>€</h1>
            <div class="flex flex-col">
                <button type="submit" class="bg-blue-700 rounded cursor-pointer p-2 text-white inline-block">Add
                    order</button>
            </div>
        </form>
    </div>
</body>

</html>
