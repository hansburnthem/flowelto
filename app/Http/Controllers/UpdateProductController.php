<?php

namespace App\Http\Controllers;

use App\FlowerCategory;
use App\Flower;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;

class UpdateProductController extends Controller
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

    //Edit Product From
    public function edit($id) {
        if($this->checkAccount()) return $this->checkAccount();

        $data_for_update = Flower::where('id', $id)->get(); 
        $data_to_print = Flower::where('id',$id)->first();

        return view('layouts.edit-product', compact('data_for_update','data_to_print'));

    }

    //Update Data
    public function update(Request $request,$id){
        // update data flowers
        $allCategory = FlowerCategory::get();
        $category = FlowerCategory::where('id',$id)->first();
        $flowers = Flower::where('flower_category_id', $id)->paginate(8);

        DB::table('flowers')->where('id',$request->id)->update([
            'flower_name' => $request->name,
            'flower_price' => $request->price,
            'flower_desc' => $request->description,
            'flower_img' => $request->image
        ]);
        return redirect('/');
    }


    //Delete Product
    // public function deleteCategory(Request $request) {
    //     if($this->checkAccount()) return $this->checkAccount();

    //     $data = FlowerCategory::find($request->id)->first();
    //     $data->delete();
    //     return back()->with('status','[scc] Success delete category');
    // }

    // public function edit($id){
    //     $detail = Flower::where('id', $id) -> first();  
    //     $data = Flower::where('id', $id) -> get(); 
    //     return view('layouts.detail-product') -> with('data', $detail);
    // }
}
