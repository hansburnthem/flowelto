@extends('layouts.app')

@section('header')
    @component("components.meta", ["title" => "Cart"])
    @endcomponent
@endsection

@section('content')
    @if (session('status'))
        @component('components.session', ['statusType' => Str::substr(session('status'), 1, 3), 'status' => Str::substr(session('status'), 5)])
        @endcomponent
        @php
            Session::forget('status');
        @endphp
    @endif
    <div class="flex flex-col items-center">
        <h1 names="category" style="text-align: center;" class="text-center text-5xl mb-5 italic underline font-serif">Your Cart</h1>

        <!--Looping Data in Cart-->
        @foreach($carts as $cart)

        <table class="table">
            <tbody>
                <tr>
                    <!--Get Flower Images-->
                    <td><img class="card-img-top" src="{{ asset($cart->flower->flower_img) }}" style="width:250px; height:350px; margin:5px;"></td>
                    <!--Get Flower Name-->
                    <td><h2 class="mx-5" style="text-align:center; color: rgb(93, 37, 71);">{{ $cart->flower->flower_name }}</h2></td>
                    <!--Get Flower Price-->
                    <td><h3>Rp {{ $cart->flower->flower_price }}</h3></td>
                    <td>
                        <!--Form for update data in Cart-->
                        <form action="{{ route('view_cart') }}" method="post">
                            @csrf
                            @method('PUT')
                            <!--Input Quantity-->
                            <input name="qty" id="qty" type="number" value="{{ $cart->qty }}" class="ml-5">
                            <input name="flower_id" id="flower_id" type="hidden" value="{{ $cart->flower_id }}" class="ml-5">
                            <!--Update button-->
                            <button type="submit" class=" hover:opacity-80 duration-300 text-white px-3 py-2 rounded-xl font-medium bg-green-400 ml-2">update</button>
                        </form>
                    </td>
                </tr>
            </tbody>
        </table>
        @endforeach
        <!--If the cart is not null, user can use checkout button-->
        @if(count($carts) != 0)
            <a href="{{ route('checkout_cart') }}" class="text-center hover:opacity-80 duration-300 text-white px-3 py-2 rounded-xl font-medium bg-pink-300 ml-2 mb-5">checkout</a>
        @endif
    </div>
@endsection
