<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\FlowerCategory;
use App\Flower;

class HomeController extends Controller
{
    //Category Product
    public function index() {
        $categories = FlowerCategory::orderBy('category_name')->get();
        return view('index',['categories'=>$categories]);
    }

    //Detail Product
    public function detailProduct($id){
        $detail = Flower::where('id', $id) -> first();  
        return view('layouts.detail-product') -> with('detail', $detail);
    }

    //View Product
    public function viewProduct($id){
        $allCategory = FlowerCategory::get();
        $category = FlowerCategory::where('id',$id)->first();
        $flowers = Flower::where('flower_category_id', $id)->paginate(8);
        return view('layouts.viewProduct', compact('category','flowers','allCategory'));
    }
    
    //Delete Flowers for Manager
    public function deleteProduct(Request $request) {
        if($this->checkAccount()) return $this->checkAccount();
        
        $data = Flower::find($request->id)->first();
        $data->delete();
        return back()->with('status','[scc] Success delete category');
    }
    
    //Search Product
    public function cari($id, Request $request)
    {
        // menangkap data pencarian
        $cari = $request->cari;
    
        $allCategory = FlowerCategory::get();
        $category = FlowerCategory::where('id',$id)->first();

        // mengambil data dari table flower sesuai pencarian data
        $flowers = Flower::where('flower_name','like',"%".$cari."%")->paginate(1);

        //return value category dan flower berdasarkan data yang diinput di form
        return view('layouts.viewProduct', compact('category','flowers','allCategory'));
    
    }


}
