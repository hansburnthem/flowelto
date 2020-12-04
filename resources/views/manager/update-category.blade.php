@extends('layouts.app')

@section('header')
    @component("components.meta", ["title" => "Update Categories"])
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
    <div class="mb-5 pt-5 px-0 md:px-10 md:max-w-5xl w-64 md:w-auto bg-white text-black rounded-2xl shadow-lg">
        <p class="text-center text-5xl mb-5 italic underline font-serif">Update Category</p>
        <div class="bg-green-400 rounded-2xl shadow-xl md:mx-2 mb-5 text-white">
            <img src="{{ asset('storage/'. $category->category_img) }}" class="w-52 rounded-2xl">

        </div>
    </div>
@endsection
