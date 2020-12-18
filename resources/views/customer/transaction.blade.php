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
        <!--Tittle-->
        <h1 names="category" style="text-align: center;" class="text-center text-5xl mb-5 italic underline font-serif">Your Transaction History</h1>
        @foreach($transactions as $transaction)
            <a href="{{ route('view_detail_transaction',['id'=>$transaction->id]) }}" class="p-2 bg-pink-300 m-2 text-white rounded-2xl cursor-pointer">
                <h4>
                    <!--Get Transaction date-->
                    Transaction at {{ $transaction->created_at }}
                </h4>
            </a>
        @endforeach
    </div>
@endsection
