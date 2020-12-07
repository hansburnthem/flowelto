<?php

namespace App\Http\Controllers;
use App\FlowerCategory;
use App\Flower;
use Illuminate\Http\Request;

class ViewProductController extends Controller
{
    public function viewProduct($id){
        $allCategory = FlowerCategory::get();
        $category = FlowerCategory::where('id',$id)->first();
        $flowers = Flower::where('flower_category_id', $id)->paginate(8);
        return view('layouts.viewProduct', compact('category','flowers','allCategory'));
    }
    
}
