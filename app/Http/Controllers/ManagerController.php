<?php

namespace App\Http\Controllers;

use App\FlowerCategory;
use App\Flower;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;

class ManagerController extends Controller
{
//-------------------------------------------------MANAGER AUTHENTICATION--------------------------------------------------------------    
    //Middleware for Auth
    public function __construct()
    {
        $this->middleware(['auth']);
    }

    //Acount must be Manager
    public function checkAccount() {
        if(auth()->user()->role_id != 1) return redirect()->route('home')->with('status','[err] Please login with manager account');
    }

//-------------------------------------------------CATEGORIES--------------------------------------------------------------

    //View Categories for Manager
    public function viewCategories() {
        if($this->checkAccount()) return $this->checkAccount();

        $categories = FlowerCategory::orderBy('category_name')->get();

        return view('manager.manage-categories',['categories'=>$categories]);
    }

    //Update Categories
    public function viewCategory($id) {
        if($this->checkAccount()) return $this->checkAccount();

        $category = FlowerCategory::where('id',$id)->first();
        return view('manager.update-category',['category'=>$category]);
    }

    //Delete Categories
    public function deleteCategory(Request $request) {
        if($this->checkAccount()) return $this->checkAccount();

        $data = FlowerCategory::find($request->id)->first();
        $data->delete();
        return back()->with('status','[scc] Success delete category');
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

        $categories                = FlowerCategory::find($id);
        $categories->category_name = $request->category_name;

        if($request->file('category_img') != null)
        {
            $file = $request->file('category_img');
            $destinationPath = 'assets/categories/';
            $filename = date('YmdHis')."_"."Category".$request->category_name.".".$file->getClientOriginalExtension();
            $file->move($destinationPath, $filename);

            $categories->category_img = $destinationPath.$filename;
    	}

        $categories->save();
        $categories = FlowerCategory::orderBy('category_name')->get();

        // return redirect()->route('updateFormCategories', [$id]);
        // return redirect()->back()->with(['status' => 'Profile updated successfully.']);
        return view('index',compact('categories'));
    }

//-------------------------------------------------FLOWERS--------------------------------------------------------------


    //Form Add Flower
    public function FormAddFlower(){
        $flower = Flower::with('category')->paginate();
        $category=FlowerCategory::all();
        return view('manager.add-flower',compact('flower','category'));
    }

    //Add Flower
    public function addFlower(Request $request){
        $flower = Flower::with('category')->paginate();
        $flower = Flower::create($request->all());
        if($request->hasFile('flower_img')){
            $request->file('flower_img')->move('assets/categories/',$request->file('flower_img')->getClientOriginalName());
            $filenames= "assets/categories/";
            $flower->flower_img = $filenames.$request->file('flower_img')->getClientOriginalName();
            $flower->save();
        }
        return redirect('/');
    }

    //Update Flower Form
    public function edit($id) {
        if($this->checkAccount()) return $this->checkAccount();
        
        $category = FlowerCategory::all();
        $data = Flower::with('category')->paginate();
        $data = Flower::find($id);

        return view('manager.edit-product', compact('data','category'));
    }

    //Update Flower
    public function update(Request $request, $id){
        $flower=Flower::with('category')->paginate();
        $category = FlowerCategory::all();
        $flower = Flower::find($id);
        $flower->update($request->all());

        if($request->hasFile('flower_img')){
            $request->file('flower_img')->move('assets/categories/',$request->file('flower_img')->getClientOriginalName());
            $filenames= "assets/categories/";
            $flower->flower_img = $filenames.$request->file('flower_img')->getClientOriginalName();
            $flower->save();
        }
        return redirect('/');
    }

    //Delete Flower
    public function delete($id){
        $flower = Flower::find($id);
        $flower->delete($flower);
        return redirect('/');
    }   

}
