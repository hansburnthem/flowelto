<?php

namespace App\Http\Controllers;

use App\FlowerCategory;
use App\Flower;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;

class ManagerController extends Controller
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
    public function viewCategories() {
        if($this->checkAccount()) return $this->checkAccount();

        $categories = FlowerCategory::orderBy('category_name')->get();

        return view('manager.manage-categories',['categories'=>$categories]);
    }

    //Delete Categories
    public function deleteCategory(Request $request) {
        if($this->checkAccount()) return $this->checkAccount();

        $data = FlowerCategory::find($request->id)->first();
        $data->delete();
        return back()->with('status','[scc] Success delete category');
    }

    //View Category for all user
    public function viewCategory($id) {
        if($this->checkAccount()) return $this->checkAccount();

        $category = FlowerCategory::where('id',$id)->first();
        return view('manager.update-category',['category'=>$category]);
    }

    //Update Categories Form
    public function updateFormCategories($id){
        $category = FlowerCategory::where('id',$id)->first();
        return view('updateCategory',['category'=>$category]);
    }

    //Update Categories
    public function updateCategory(Request $request, $id) {
        $message = [
            'category_name.min'         => 'New category name with minimum 5 characters',
            'category_name.required'    => 'New category name must be filled',
        ];	
        
        $validator = Validator::make($request->all(), [
            'category_name' => 'required|min:5'
        ], $message);

        if($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput($request->all);
        }

        $category                = FlowerCategory::find($id);
        $category->category_name = $request->category_name;

        if($request->file('category_img') != null)
        {
            $file = $request->file('category_img');
            $destinationPath = 'storage/';
            $filename = date('YmdHis')."_"."Category".$request->category_name.".".$file->getClientOriginalExtension();
            $file->move($destinationPath, $filename);

            $category->category_img = $destinationPath.$filename;
    	}

        $category->save();

        return redirect()->route('updateFormCategories', [$id]);
        // return redirect()->back()->with(['status' => 'Profile updated successfully.']);
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

    //Detail Product
    public function detailProduct($id){
        $detail = Flower::where('id', $id) -> first();  
        return view('layouts.detail-product') -> with('detail', $detail);
    }
}
