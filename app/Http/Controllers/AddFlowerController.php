<?php

namespace App\Http\Controllers;

use App\FlowerCategory;
use App\Flower;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;

class AddFlowerController extends Controller
{
    //Middleware for Auth
    public function __construct()
    {
        $this->middleware(['auth']);
    }

    //Acount must be Manager
    public function checkAccount() {
        if(auth()->user()->role_id != 1) return redirect()->route('home')->with('status','[err] Please login with manager account');
    }

    //View Categories for Manager
    public function addFlower() {
        if($this->checkAccount()) return $this->checkAccount();

        return view('manager.add-flower');
    }
}
