<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Tables;

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
}
