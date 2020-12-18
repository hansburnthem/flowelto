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
        <h1>Transaction History</h1>
        @foreach($transactions as $transaction)
            <a href="{{ route('view_detail_transaction',['id'=>$transaction->id]) }}" class="p-2 bg-green-400 m-2 text-white rounded-2xl cursor-pointer">
                Transaction at {{ $transaction->created_at }}
            </a>
        @endforeach
    </div>
@endsection
