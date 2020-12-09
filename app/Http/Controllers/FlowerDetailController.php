<?php

namespace App\Http\Controllers;
use App\FlowerCategory;
use App\Flower;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;

class FlowerDetailController extends Controller
{
    //Detail Product
    public function detailProduct($id){
        $detail = Flower::where('id', $id) -> first();  
        return view('layouts.detail-product') -> with('detail', $detail);
    }
}
