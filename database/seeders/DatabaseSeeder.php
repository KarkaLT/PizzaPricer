<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        $table = DB::table("toppings");
        $toppings = [
            ['name' => 'Peperoni'],
            ['name' => 'Mushrooms'],
            ['name' => 'Onions'],
            ['name' => 'Sausage'],
            ['name' => 'Bacon'],
            ['name' => 'Cheese'],
            ['name' => 'Black Olives'],
            ['name' => 'Green Peppers'],
            ['name' => 'Pineapple'],
            ['name' => 'Spinach'],
            ['name' => 'Tomatoes'],
            ['name' => 'Chicken'],
            ['name' => 'Beef'],
            ['name' => 'Ham'],
            ['name' => 'Salami'],
            ['name' => 'Anchovies'],
            ['name' => 'Artichoke'],
            ['name' => 'Buffalo Chicken'],
            ['name' => 'Feta Cheese'],
            ['name' => 'Ground Beef'],
            ['name' => 'Jalapeno Peppers'],
            ['name' => 'Meatballs'],
            ['name' => 'Red Onions']
        ];

        foreach ($toppings as $topping) {
            $table->updateOrInsert($topping);
        }
    }
}