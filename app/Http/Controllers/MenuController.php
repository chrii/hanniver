<?php

namespace App\Http\Controllers;
use App\Product;
use App\Category;
use Illuminate\Http\Request;

class MenuController extends Controller
{
    public function index() {
        $categorys = Category::all();
        $products = Product::all()
                ->groupBy('category_id');
        $products->each(function($product) {
            $product->each(function($item) {
                $item['actual_price'] = ($item['price_wo_tax'] / 100) * 20 + $item['price_wo_tax'];
                $item['actual_price'] = round($item['actual_price'], 1);
                $item['actual_price'] = number_format($item['actual_price'], 2, ',', '');
                return $item;
            });
            return $product;
        });
        return view('menu-views.view-menu', [
                    'products' => $products,
                    'categorys' => $categorys
                    ]);
    }
}
