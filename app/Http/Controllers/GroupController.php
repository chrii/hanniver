<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\UserTypes;

class GroupController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
    }

    public function index() {
        $table = UserTypes::all();

        return view('group-views.index-group', ['groups' => $table]);
    }

    public function store(Request $request) {
        $request->validate([
            'name' => ['min:1']
        ]);
        
        UserTypes::create([
            'group_name' => $request->name
        ]);

        return redirect('groups');
    }
}
