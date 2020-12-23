<?php

namespace App\Http\Controllers;

use App\Cart;
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
        $flowers = Flower::where('flower_name','like',"%".$cari."%")->orwhere('flower_price','like',"%".$cari."%")->paginate(1);

        //return value category dan flower berdasarkan data yang diinput di form
        return view('layouts.viewProduct', compact('category','flowers','allCategory'));

    }

    // Add to Cart method
    public function addToCart($id, Request $request) {
        // authentikasi user hanya role customer
        if(!auth()->check() || auth()->user()->role_id != 2) {
            return redirect()->route('home')->with('status','[err] Please login with user or customer account');
        }

        //check apakah item sudah ada di cart
        $cart = Cart::where('user_id', auth()->user()->id)->where('flower_id', $id)->first();
        if($cart != null){
            $qty = $cart->qty + $request->qty;
            $cart->qty = $qty;
            $cart->save();

            return redirect()->route('view_cart')->with('status','[scc] Success add to cart');
        }

        Cart::create([
            'user_id'=>auth()->user()->id,
            'flower_id'=>$id,
            'qty'=>$request->qty
        ]);

        return redirect()->route('view_cart')->with('status','[scc] Success add to cart');
    }


}
