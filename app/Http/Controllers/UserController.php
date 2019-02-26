<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class UserController extends Controller
{

    public function __construct () {
        $this->middleware('auth');
    }

    public function index(){

        $table = User::select('name', 'email', 'group')->get();

        $table->each(function($item){
            switch($item->group) {
                case '1001': 
                    return $item->group = 'Admin';
                case '1002': 
                    return $item->group = 'Kellner';
            }
        });
        //dd($table);
        return view('user-views.index-user', ['userdata' => $table]);
    }
    public function waiterIndex () {
        $waiters = $this->index()->where('group', 'Kellner')->get();
        dd($waiters);
    }

    public function edit () {
        $table = "";
    }
}
