<?php

namespace App\Http\Controllers;

use App\FlowerCategory;
use Illuminate\Http\Request;

class ManagerController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth']);
    }

    public function checkAccount() {
        if(auth()->user()->role_id != 1) return redirect()->route('home')->with('status','[err] Please login with manager account');
    }

    public function viewCategories() {
        if($this->checkAccount()) return $this->checkAccount();

        $categories = FlowerCategory::orderBy('category_name')->get();

        return view('manager.manage-categories',['categories'=>$categories]);
    }

    public function deleteCategory(Request $request) {
        if($this->checkAccount()) return $this->checkAccount();

        $data = FlowerCategory::find($request->id)->first();
        $data->delete();
        return back()->with('status','[scc] Success delete category');
    }

    public function viewCategory($id) {
        if($this->checkAccount()) return $this->checkAccount();

        $category = FlowerCategory::where('id',$id)->first();
        return view('manager.update-category',['category'=>$category]);
    }

    public function updateCategory() {

    }
}
