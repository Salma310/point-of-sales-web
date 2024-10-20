<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductController extends Controller
{
    //Menampilkan Daftar Produk

    public function babyKid(){
        $products = [
            (object) ['code' => 'BK001', 'name' => 'Cusson Baby', 'stock' => 20, 'price' => 5000],
            (object) ['code' => 'BK002', 'name' => 'Kodomo', 'stock' => 35, 'price' => 7500],
            (object) ['code' => 'BK003', 'name' => 'Zwitsal Kids', 'stock' => 20, 'price' => 3000],
        ];

        return view('category.baby-kid', ['products' => $products]);
        return view('category.baby-kid');
    }
    public function beautyHealth(){
        $products = [
            (object) ['code' => 'BY001', 'name' => 'Wardah', 'stock' => 25, 'price' => 15000],
            (object) ['code' => 'BY002', 'name' => 'Lifebuoy', 'stock' => 35, 'price' => 5000],
            (object) ['code' => 'BY003', 'name' => 'Sunsilk', 'stock' => 25, 'price' => 10000],
        ];
        return view('category.beauty-health', ['products' => $products]);
        return view('category.beauty-health');
    }
    public function foodBeverage(){
        $products = [
            (object) ['code' => 'FB001', 'name' => 'Roti', 'stock' => 20, 'price' => 4000],
            (object) ['code' => 'FB002', 'name' => 'Indomilk', 'stock' => 50, 'price' => 5000],
            (object) ['code' => 'FB003', 'name' => 'Taro', 'stock' => 20, 'price' => 5000],
        ];

        return view('category.food-beverage', ['products' => $products]);
        return view('category.food-beverage');
    }
    public function homeCare(){
        $products = [
            (object) ['code' => 'HC001', 'name' => 'Super Pel', 'stock' => 25, 'price' => 10000],
            (object) ['code' => 'HC002', 'name' => 'Baygon', 'stock' => 15, 'price' => 20000],
            (object) ['code' => 'HC003', 'name' => 'Kamper', 'stock' => 25, 'price' => 8000],
        ];

        return view('category.home-care', ['products' => $products]);
        return view('category.home-care');
    }
       
}
