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
     * 
     */
    public function store(Request $request) {
        Tables::create([
            'users_on_table' => 0
        ]);
        return redirect('tables');
    }

    public function show(Request $request, $id) {
        $table = Tables::find($id);

        return view('table-views.show-table', ['table' => $table]);
    }

    public function checkin(Request $request) {
        foreach( $request->all() AS $requestKey => $requestValue ) {
            $splitted = explode('-', $requestKey);
            if( $splitted[0] === 'checkinTable') {
                $userId = $splitted[1];
                $tableId = $requestValue;

                $dbUser = User::find($userId);
                $dbUser->has_table = $tableId;
                if( $dbUser->active_bill === 0) {
                    //$this->createBill($userId, $tableId);
                    //dd($dbUser->allBills->sortBy('created_at')->last()->bill_id);
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
            'bon_id' => $table,
            'completed' => false
        ])->save();

    }
}
