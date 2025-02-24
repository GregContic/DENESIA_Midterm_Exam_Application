<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductController extends Controller
{
    // Array of products organized by themes
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

    // Display the main page with all themes
    public function index()
    {
        return view('products.index', [
            'themes' => array_keys($this->products)
        ]);
    }

    // Show products for a specific theme
    public function showProducts($theme)
    {
        if (!array_key_exists($theme, $this->products)) {
            return redirect()->route('products.index')
                           ->with('error', 'Theme not found!');
        }

        $products = $this->products[$theme];
        $totalProducts = count($products);
        $averagePrice = number_format(array_sum(array_column($products, 'price')) / $totalProducts, 2);

        return view('products.show', [
            'theme' => $theme,
            'products' => $products,
            'themes' => array_keys($this->products),
            'totalProducts' => $totalProducts,
            'averagePrice' => $averagePrice
        ]);
    }
}
