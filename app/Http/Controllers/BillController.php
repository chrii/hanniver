<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Bill;
use App\Product;


class BillController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
    }

    public function show(Request $request) {
        //if( auth()->user()->id == $request->id){
            $bons = Bill::find(auth()->user()->active_bill);

            $bill = [];
            $bill['summary'] = 0;
            foreach( $bons->getBons AS $bon) {
                $bonProducts = collect(json_decode($bons->decodeBonString($bon->product_string)));
                foreach( $bonProducts AS $productName => $productCred) {
                    if(!array_key_exists($productName, $bill)){
                        $bill[$productName] = [
                            'price' => $productCred->price,
                            'quantity' => $productCred->quantity,
                            'quantity_price' => $productCred->quantity_price
                        ];
                        $bill['summary'] += $bill[$productName]['quantity_price'];
                    } else {
                        $bill[$productName]['quantity'] = $bill[$productName]['quantity'] + $productCred->quantity;
                        $bill[$productName]['quantity_price'] = $bill[$productName]['quantity_price'] + $productCred->quantity;
                    }
                }
            }
            $bill = collect($bill);
/*         } else {
            return redirect('home');
        } */
        return view('bill-views.view-bill',['bill' => $bill, 'bons' => $bons]);
    }
}