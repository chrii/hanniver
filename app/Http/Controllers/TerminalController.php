<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Bon;
use App\Bill;
use App\User;

class TerminalController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
    }

    public function index(Request $request) {
        $bills = Bill::all()->where('completed', false);

        /**
         * Maps Bills and Bons with User
         */
        $namedBons = $bills->map(function($value, $key) {
            $user = User::find($value->owner_id)->name;
            $value['owner'] = $user;
            $value['bons'] = $value->getBons->where('completed', false);
            return $value;
        });
        $productList = [];
        foreach($namedBons AS $bill) {
            $productList[$bill->owner] = [];
            foreach($bill->bons->pluck('product_string') AS $bon) {
                $productList[$bill->owner][] = collect(json_decode($bill->decodeBonString($bon)));
            }
        }
        $productList = collect($productList);
        return view('terminal-views.view-terminal', ['bills' => $bills, 'products' => $productList]);
    }
}
/* $namedBons = collect([]);
foreach( $bills AS $bill ) {
    dump($bill);
    $username = User::find($bill->owner_id)->name;
    $namedBons[$username] = [
        'bill_id' => $bill->bill_id,
        'table_id' => $bill->table_id,
        'products' => []
    ];
    foreach($bill->getBons->where('completed', 'false')->pluck('product_string') AS $bons) {
        $namedBons[$username]['products'][] = 'test';
    }
} */