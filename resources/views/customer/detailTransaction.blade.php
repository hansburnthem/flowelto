@extends('layouts.app')

@section('header')
    @component("components.meta", ["title" => "Home"])
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
    <div class="flex flex-col items-center" >
        <!--Get Transaction date-->
        <h1>Your Transaction at {{ $transaction->created_at }}</h1>
        <table class="table table-bordered">
            <tr>
                <th>Flower Image</th>
                <th>Flower Name</th>
                <th>Subtotal</th>
                <th>Quantity</th>
            </tr>
            @foreach($transaction->transactionDetails as $transactionDetail)

                <tr>
                    <td>
                        <!--Get Flower Images-->
                        <img src="{{ asset($transactionDetail->flower->flower_img) }}" style="width:250px; height:350px; margin:5px;">
                    </td>
                    <td>
                        <!--Get Flower Name-->
                        {{ $transactionDetail->flower->flower_name }}
                    </td>
                    <td>
                        <!--Get Flower Price using quantity * price-->
                        Rp {{ $transactionDetail->flower->flower_price * $transactionDetail->qty }}
                    </td>
                    <td>
                        <!--Get Flower Quantity-->
                        {{ $transactionDetail->qty }}
                    </td>
                </tr>
            @endforeach
        </table>
        <div class="p-2 bg-pink-300 text-white rounded-2xl my-3">
            <!--Print total price-->
           <h2>Total Price: Rp {{ $totalPrice }}</h2> 
        </div>
    </div> <br><br>
@endsection
