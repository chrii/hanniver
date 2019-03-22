<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Tables;
use App\User;
use App\Bill;

class TablesController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
    }

    public function index() {
        $tables = Tables::all();

        return view('table-views.index-table', ['tables' => $tables]);
    }

    /**
     * Inherits store function
     */
    public function store(Request $request) {
        Tables::create([
            'users_on_table' => 0
        ]);
        return redirect('tables');
    }

    public function show(Request $request, $id) {
        $table = Tables::find($id);
        $array = [];
        $array['summary'] = 0;
        $getBonStrings = $table->getBills->pluck('product_string');
        foreach($getBonStrings AS $bon) {
            $json = collect(json_decode(Bill::first()->decodeBonString($bon)));
            foreach( $json AS $productName => $productCred) {
                if(!array_key_exists($productName, $array)){
                    $array[$productName] = [
                        'price' => $productCred->price,
                        'quantity' => $productCred->quantity,
                        'quantity_price' => $productCred->quantity_price
                    ];
                    $array['summary'] += $array[$productName]['quantity_price'];
                } else {
                    $array[$productName]['quantity'] = $array[$productName]['quantity'] + $productCred->quantity;
                    $array[$productName]['quantity_price'] = $array[$productName]['quantity_price'] + $productCred->quantity;
                }
            }
        }
        //$array['summary'] = number_format($array['summary'], 2, ',', '');
        return view('table-views.show-table', ['table' => $table, 'summary' => $array]);
    }

    public function checkin(Request $request) {
        foreach( $request->all() AS $requestKey => $requestValue ) {
            $splitted = explode('-', $requestKey);
            if( $splitted[0] === 'checkinTable') {
                $userId = $splitted[1];
                $tableId = $requestValue;
                $this->createBill($userId, $tableId);

                $dbUser = User::find($userId);
                $dbUser->has_table = $tableId;
                if( $dbUser->active_bill === 0) {
                    $dbUser->active_bill = $dbUser
                                            ->allBills
                                            ->sortBy('created_at')
                                            ->last()
                                            ->bill_id;
                    $dbUser->save();
                    
                }
            }
        }
        return redirect('tables/' . $tableId);
    }
    /**
     * creates new Bill 
     * @return true
     */
    public function createBill($id, $table) {
        Bill::create([
            'owner_id' => $id,
            'table_id' => $table,
            'completed' => false
        ])->save();

    }
}