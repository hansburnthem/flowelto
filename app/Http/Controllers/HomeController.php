<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\FlowerCategory;

class HomeController extends Controller
{

//    public function __construct() {
//        $this->middleware('auth');
//    }

    public function index() {
        $categories = FlowerCategory::orderBy('category_name')->get();

        return view('index',['categories'=>$categories]);
    }
}
