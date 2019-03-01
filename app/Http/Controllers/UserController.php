<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use App\User;
use App\UserTypes;

class UserController extends Controller
{

    /**
     * Only if Logged in
     */
    public function __construct () {
        $this->middleware('auth');
    }

    public function index(Request $req){
        $request = request('user-type');
        $table = UserTypes::all();

        if (isset($request)) {
            $table = $table->where('group_id', $request);
        }
        return view('user-views.index-user', ['userdata' => $table]);
    }

    public function show($uid) {
        $user = User::where('id', $uid)
                ->get()
                ->first();

        return view('user-views.show-user', ['user' => $user]);
    }

    public function create() {
        $type = UserTypes::all();

        return view('user-views.create-user', ['usertype' => $type]);
    }

    public function store(Request $request) {

        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:6', 'confirmed'],
            'group' => ['required']
        ]);
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'group' => $request->group
        ]);
        return redirect('users');
    } 
}