<?php

namespace App\Http\Controllers;
use App\Product;
use App\Category;
use App\Bon;
use Illuminate\Http\Request;
//use Illuminate\Support\Facades\Cookie;

class MenuController extends Controller
{
    /**
     * Indexes all Products from our Products list
     * **V1.0**
     * Will show you all products out of the list
     * Later versions can maybe add an active or not active value in products
     * to get more control of our shown products
     * If you dont want some Products in this list for now, you can easily
     * add more Product Tables at the Upload section
     */
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

    /**
     * Check if Request is an Ajax Call
     * The saved Cookie will cleared and replaced to the new Request
     * If response counter.js is valid, the XHR Request will redirect to /menu/bon
     */
    public function bon(Request $request) {
        if($request->ajax()){
            \Cookie::queue(\Cookie::forget('bonString'));
            $cookie = \Cookie::queue(\Cookie::make('bonString', $request->bon, 360));
            //dd($cookie);
            return \Cookie::get('bonString');
        }
    }

    /**
     * If the Cookie response is not Null, the reques will show the Bon saved in bonString
     * Note that at this layer you can edit the input before you get an entry to the database
     * If there is more need for validation, this is the right place
     */
    public function showBon() {
        //dd(\Cookie::get('bonString'));
        if( \Cookie::get('bonString') !== null ){            
            $cookie = \Cookie::get('bonString');
            $cookieCollection = collect(json_decode($cookie));
            $fetchedProducts = collect([]);
            $summary = 0;
            foreach( $cookieCollection AS $product => $quantity) {
                $pro = Product::findOrFail($product);
                $priceWtax = round(($pro->price_wo_tax / 100) * 20 + $pro->price_wo_tax, 1);
                $summary += $priceWtax * $quantity;
                $fetchedProducts[] = [
                    'id' => $pro->product_id,
                    'name' => $pro->product_name,
                    'price' => $priceWtax,
                    'quantity' => $quantity
                ];
            }

            return view('menu-views.bon-view-menu', [
                    'products' => $fetchedProducts, 
                    'summary' => $summary
                ]);
        }
        return redirect('menu');
    }
    public function storeBon(Request $request) {
        if($request->ajax()) {
            $user = auth()->user();
            if( \Cookie::get('bonString') !== null) {
                $cookie = \Cookie::get('bonString');
                $cookieCollection = collect(json_decode($cookie));

                if( $user->has_table !== 0 && $user->has_bill !== 0 ){
                    $bon = Bon::create([
                        'owner_id' => $user->id,
                        'bill_id' => $user->active_bill,
                        'product_string' => $cookie
                        ]);
                    return '{"return":"true","bill_id":"' . $user->active_bill. '"}';
                } else {
                    return '{return:"false",code:"User has is not on a Table or has a Bill"}';
                }
            } else {
                return '{return: "false",code:"There is no Cookie to hanlde"}';
            }
        }

    }
}
