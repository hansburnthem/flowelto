<?php

namespace App\Http\Controllers;

use App\Cart;
use App\Transaction;
use App\TransactionDetail;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth']);
    }

    //Acount must be Manager
    public function checkAccount() {
        if(auth()->user()->role_id != 2) return redirect()->route('home')->with('status','[err] Please login with user account');
    }

    // render view cart
    public function viewCart() {
        if($this->checkAccount()) return $this->checkAccount();

        $carts = Cart::where('user_id',auth()->user()->id)->get();
        if(count($carts) != 0) return view('customer.cart',['carts'=>$carts]);
        else return redirect()->route('home')->with('status','[err] No item in cart');
    }

    // checkout cart
    public function checkoutCart() {
        if($this->checkAccount()) return $this->checkAccount();

        Transaction::create([
            'user_id'=>auth()->user()->id,
        ]);

        $trid = Transaction::where('user_id',auth()->user()->id)->orderBy('created_at','desc')->first();
        $carts = Cart::where('user_id',auth()->user()->id)->get();

        foreach ($carts as $cart){
            TransactionDetail::create([
                'transaction_id'=>$trid->id,
                'flower_id'=>$cart->flower_id,
                'qty'=>$cart->qty
            ]);
        }

        Cart::where('user_id',auth()->user()->id)->delete();
        return redirect()->route('home')->with('status','[scc] Checkout success');
    }

    // update cart
    public function updateCart(Request $request) {
        if($this->checkAccount()) return $this->checkAccount();

        $cart = Cart::where('user_id', auth()->user()->id)->where('flower_id', $request->flower_id)->first();
        if($cart != null && $request->qty != $cart->qty){
            $cart->qty = $request->qty;
            $cart->save();

            return back()->with('status','[scc] Success update quantity');
        }else return back()->with('status','[err] Quantity can not be same');
    }

    // view transactions page
    public function viewTransactions() {
        if($this->checkAccount()) return $this->checkAccount();

        $transactions = Transaction::where('user_id',auth()->user()->id)->orderBy('created_at','desc')->get();
        if(count($transactions) != 0) return view('customer.transaction',['transactions'=>$transactions]);
        else return redirect()->route('home')->with('status','[err] No transactions found');
    }

    // view detail transaction page
    public function viewDetailTransaction($id) {
        if($this->checkAccount()) return $this->checkAccount();
        $transaction = Transaction::where('id',$id)->first();

        $totalPrice = 0;
        foreach ($transaction->transactionDetails as $transactionDetail) {
            $totalPrice += $transactionDetail->flower->flower_price * $transactionDetail->qty;
        }

        if($transaction != null) return view('customer.detailTransaction',['transaction'=>$transaction, 'totalPrice'=>$totalPrice]);
        else return back()->with('status','[err] No transactions found');
    }
}
