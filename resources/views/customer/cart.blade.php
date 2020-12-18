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
        @foreach($carts as $cart)
            <div class="flex flex-row items-center">
                <img class="card-img-top" src="{{ asset($cart->flower->flower_img) }}" style="width:220px; margin:5px;">
                <h1 class="mx-5">{{ $cart->flower->flower_name }}</h1>
                <h5>Rp {{ $cart->flower->flower_price }}</h5>
                <form action="{{ route('view_cart') }}" method="post">
                    @csrf
                    @method('PUT')

                    <input name="qty" id="qty" type="number" value="{{ $cart->qty }}" class="ml-5">
                    <input name="flower_id" id="flower_id" type="hidden" value="{{ $cart->flower_id }}" class="ml-5">
                    <button type="submit" class=" hover:opacity-80 duration-300 text-white px-3 py-2 rounded-xl font-medium bg-green-400 ml-2">update</button>
                </form>
            </div>
        @endforeach
        @if(count($carts) != 0)
            <a href="{{ route('checkout_cart') }}" class="text-center hover:opacity-80 duration-300 text-white px-3 py-2 rounded-xl font-medium bg-pink-300 ml-2 mb-5">checkout</a>
        @endif
    </div>
@endsection
