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
    <div class="flex flex-col items-center">
        <h1>Transaction at {{ $transaction->created_at }}</h1>
        <table>
            <tr>
                <th>Flower Image</th>
                <th>Flower Name</th>
                <th>Subtotal</th>
                <th>Quantity</th>
            </tr>
            @foreach($transaction->transactionDetails as $transactionDetail)
                <tr>
                    <td>
                        <img src="{{ asset($transactionDetail->flower->flower_img) }}" style="width:220px; margin:5px;">
                    </td>
                    <td>
                        {{ $transactionDetail->flower->flower_name }}
                    </td>
                    <td>
                        Rp {{ $transactionDetail->flower->flower_price * $transactionDetail->qty }}
                    </td>
                    <td>
                        {{ $transactionDetail->qty }}
                    </td>
                </tr>
            @endforeach
        </table>
        <div class="p-2 bg-green-400 text-white rounded-2xl my-5">
            Total Price: Rp {{ $totalPrice }}
        </div>
    </div>
@endsection
