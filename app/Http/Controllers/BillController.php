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

    /**
     * Collects all active Bons and returns the whole Bill for the user whos logged in
     * 
     */
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
                            'quantity' => $productCred->quantity
                        ];
                    } else {
                        // Adds the Product Quanity
                        $bill[$productName]['quantity'] = $bill[$productName]['quantity'] + $productCred->quantity;
                    }
                    $quantity_price = $bill[$productName]['price'] * $bill[$productName]['quantity'];
                    $bill[$productName]['quantity_price'] = $quantity_price;
                }
            }

            // Workaround for Summary
            // Look through
            $bill = collect($bill);
            foreach( $bill->pluck('quantity_price') AS $sumKey => $sum ) {
                if( $sumKey === 0 ) {
                    continue;
                } else {
                    $bill['summary'] += $sum;
                }
            }
/*         } else {
            return redirect('home');
        } */
        return view('bill-views.view-bill',['bill' => $bill, 'bons' => $bons]);
    }
}