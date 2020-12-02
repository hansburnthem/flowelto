@extends('layouts.app')

@section('header')
    @component("components.meta", ["title" => ""])
    @endcomponent
@endsection

@section('content')
    @if (session('status'))
        <div class="p-2 w-auto rounded-xl text-green-700 bg-green-100 border border-green-300 flex flex-row mb-2">
            @component ('components.icons', ['icon' => 'success', 'size'=>'5','hidden' => false])
            @endcomponent
            <div class="text-sm text-center ml-1">
                {{ session('status') }}
            </div>
        </div>
        @php
            Session::forget('status');
        @endphp
    @endif
    @if (session('error'))
        <div class="p-2 w-auto rounded-xl text-red-700 bg-red-100 border border-red-300 flex flex-row mb-2">
            @component ('components.icons', ['icon' => 'error', 'size'=>'5','hidden' => false])
            @endcomponent
            <div class="text-sm text-center ml-1">
                {{ session('status') }}
            </div>
        </div>
        @php
            Session::forget('status');
        @endphp
    @endif
    <div class="mx-5 py-5 px-10 md:mx-32 lg:mx-56 bg-white text-black rounded-2xl shadow-lg">

    </div>
@endsection
