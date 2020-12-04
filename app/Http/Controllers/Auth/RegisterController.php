<?php

namespace App\Http\Controllers\Auth;

use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function __construct() {
        $this->middleware(['guest']);
    }

    public function index() {
        return view('auth.register');
    }

    public function store(Request $request) {
        $this->validate($request, [
            'username' => 'required|min:5',
            'email' => 'required|email|max:255',
            'password' => 'required|min:8',
            'gender' => 'required',
            'address' => 'required|min:10',
            'dob' => 'required',
        ]);

        User::create([
            'username' => $request->username,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'gender' => $request->gender,
            'address' => $request->address,
            'dob' => $request->dob,
        ]);

        auth()->attempt($request->only('email', 'password'));

        return redirect()->route('home')->with('status','[scc] Congrats!! Your account has been created');
    }
}
