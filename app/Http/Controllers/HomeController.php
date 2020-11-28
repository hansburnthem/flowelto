<?php

namespace App\Http\Controllers;
use App\Category;
use App\Flower;
use App\Transaction;
use App\DetailTransaction;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function home(){
        $allCategory = Category::get();
        $category = Category::paginate(4);
        return view('home', compact('category', 'allCategory'));
    }
}
