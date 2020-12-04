<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ChangePassword extends Controller
{
    public function __construct() {
        $this->middleware(['auth']);
    }

    public function index() {
        return view('auth.change-password');
    }

    public function store(Request $request) {
        $this->validate($request, [
            'old_password' => 'required|password',
            'new_password' => 'required|min:8',
            'password_confirmation' => 'required|same:new_password'
        ]);

        $user = User::find(auth()->user()->id);
        $user->password = Hash::make($request->new_password);
        $user->save();

        return redirect()->route('home')->with('status','[scc] Success!! Your password has been changed');
    }
}
