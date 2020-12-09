@extends('layouts.app')

@section('header')
    @component("components.meta", ["title" => "Manage Categories"])
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
        <p class="text-center text-5xl mb-5 italic underline font-serif">Manage Categories</p>

        <div class="card-deck d-flex justify-content-center">
            @if(count($categories))
            @foreach($categories as $category)
                <div class="card-deck">
                    <div class="card" style="margin:30px; background-color:rgb(245, 215, 220);">
                        <img class="card-img-top rounded-2xl" src="{{ asset($category->category_img) }}" style="width:330px; height:430px; margin:5px;">
                        <div class="card-body">
                            <h3 class="card-title" style="text-align:center; color: black;">{{ $category->category_name }}</h3>
                        </div>

                        <div class="card-footer d-flex justify-content-center margin">
                            <form class="w-full p-2 bg-red-400 rounded-l-2xl hover:text-white cursor-pointer hover:opacity-90 duration-300 "
                                  action="{{ route('manager_categories')}}" method="post" onclick="this.submit()">
                                @csrf
                                @method('DELETE')
                                <input type="hidden" name="id" value="{{ $category->id }}">
                                Delete
                            </form>

                            <a href="{{route('manager_categories_update', ['id'=>$category->id])}}" class="w-full p-2 bg-white rounded-r-2xl text-black cursor-pointer hover:opacity-90 duration-300 ">
                                Update
                            </a>
                        </div> 
                    </div>       
                </div>
            @endforeach
            @else
                <p>There's no categories</p>
            @endif
        </div>


{{-- 
    <div class="mb-5 pt-5 px-0 md:px-10 md:max-w-5xl w-64 md:w-auto bg-white text-black rounded-2xl shadow-lg">
        <p class="text-center text-5xl mb-5 italic underline font-serif">Manage Categories</p>
        <div class="flex flex-row flex-wrap justify-center text-center">
            @if(count($categories))
                @foreach($categories as $category)
                   hover:bg-white hover:text-black
                    <div class="bg-green-400 rounded-2xl shadow-xl md:mx-2 mb-5 text-white">
                        <img src="{{ asset('storage/'. $category->category_img) }}" class="w-52 rounded-2xl">
                        <div class="p-2">
                            {{ $category->category_name }}
                        </div>
                        <div class="flex flex-row items-center justify-center">
                            <form class="w-full p-2 bg-red-400 rounded-l-2xl hover:text-white cursor-pointer hover:opacity-90 duration-300 "
                                  action="{{ route('manager_categories')}}" method="post" onclick="this.submit()">
                                @csrf
                                @method('DELETE')
                                <input type="hidden" name="id" value="{{ $category->id }}">
                                Delete
                            </form>

                            <a href="{{route('manager_categories_update', ['id'=>$category->id])}}" class="w-full p-2 bg-white rounded-r-2xl text-black cursor-pointer hover:opacity-90 duration-300 ">
                                Update
                            </a>
                        </div>
                    </div>
                @endforeach
            @else
                <p>There's no categories</p>
            @endif
        </div>
    </div> --}}
@endsection
