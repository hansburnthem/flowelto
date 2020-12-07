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

    //Delete Flowers
    public function deleteProduct(Request $request) {
        if($this->checkAccount()) return $this->checkAccount();

        $data = Flower::find($request->id)->first();
        $data->delete();
        return back()->with('status','[scc] Success delete category');
    }
    
}
