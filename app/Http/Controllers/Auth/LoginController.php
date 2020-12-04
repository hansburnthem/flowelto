<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function __construct() {
        $this->middleware(['guest']);
    }

    public function index() {
        return view('auth.login');
    }

    public function store(Request $request) {
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (!\Auth::attempt($request->only('email', 'password'), $request->remember)) {
            return back()->with('status', '[err] Invalid login details')->withInput();
        }

//        $request->session()->put('status', 'You are logged in');
        return redirect()->route('home')->with('status', '[scc] You are logged in');
    }
}
