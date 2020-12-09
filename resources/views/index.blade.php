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
    <div class="mb-5 pt-5 px-0 md:px-10 md:max-w-5xl w-64 md:w-auto">
        <p class="text-center text-5xl mb-5 italic underline font-serif">Welcome to Flowelto Sop</p>
        <p class="text-center text-2xl mb-5 italic underline font-serif">The best Flower Shop in Binus University</p>

        <div class="card-deck d-flex justify-content-center">
            @if(count($categories))
            @foreach($categories as $category)
            <a href="{{URL('viewProduct/' . $category->id)}}">
                <div class="card-deck">
                    <div class="card" style="margin:30px; background-color:rgb(245, 215, 220);">
                        <img class="card-img-top rounded-2xl" src="{{ $category->category_img }}" style="width:330px; height:430px; margin:5px;">
                        <div class="card-body">
                            <h3 class="card-title" style="text-align:center; color: black;">{{ $category->category_name }}</h3>
                        </div>
                    </div>
                    
                </div>
            </a>
            @endforeach
        </div>
        @else
            <p>There's no categories</p>
        @endif
    </div>
@endsection
