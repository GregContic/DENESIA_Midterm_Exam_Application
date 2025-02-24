<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductController extends Controller
{
    private $products = [
        'Gadgets' => [
            ['name' => 'Smartphone', 'price' => 800],
            ['name' => 'Laptop', 'price' => 1200],
            ['name' => 'Smartwatch', 'price' => 250],
        ],
        'Books' => [
            ['name' => 'Laravel for Beginners', 'price' => 40],
            ['name' => 'PHP Mastery', 'price' => 35],
            ['name' => 'Clean Code', 'price' => 50],
        ],
        'Movies' => [
            ['name' => 'Inception', 'price' => 15],
            ['name' => 'The Matrix', 'price' => 12],
            ['name' => 'Interstellar', 'price' => 18],
        ],
        'Anime' => [
            ['name' => 'Attack on Titan', 'price' => 20],
            ['name' => 'Naruto', 'price' => 25],
            ['name' => 'Demon Slayer', 'price' => 22],
        ],
        'Restaurants' => [
            ['name' => 'Burger House', 'price' => 10],
            ['name' => 'Pasta Place', 'price' => 15],
            ['name' => 'Sushi World', 'price' => 25],
        ],
    ];

    public function showProducts($theme)
    {
        $products = $this->products[$theme] ?? [];
        return view('products', ['theme' => $theme, 'products' => $products]);
    }
}
