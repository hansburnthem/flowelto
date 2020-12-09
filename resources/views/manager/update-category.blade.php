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
    {{-- <div class="mb-5 pt-5 px-0 md:px-10 md:max-w-5xl w-64 md:w-auto bg-white text-black rounded-2xl shadow-lg">
        <p class="text-center text-5xl mb-5 italic underline font-serif">Update Category</p>
        <div class="bg-green-400 rounded-2xl shadow-xl md:mx-2 mb-5 text-white">
            {{-- <img src="{{ asset('storage/'. $category->category_img) }}" class="w-52 rounded-2xl"> --}}

            {{-- <img src="{{ asset($category->category_img) }}" class="w-52 rounded-2xl">

            <form name="updateCategories" enctype="multipart/form-data" action="{{URL('/manager/category/' . $category->id)}}" method="post" id="form">
                @csrf --}}

                <!--Update Category Name-->
                {{-- <td><label for="categoryName" id="text-label">Category Name </label></td><br>
                <td><input type="text" id="username" name="category_name" value="{{$category->category_name}}" placeholder="Input new category name" required></td><br>
                @if($errors->first('category_name'))
                    <div class="alert alert-danger">{{$errors->first('category_name')}}</div>
                @endif --}}

                <!--Update Category Image-->
                {{-- <td><label for="categoryImg" id="text-label">Category Image</label></td><br>
                <input type="file" name="category_img">
                <input type="hidden" name="_token" value="{{ csrf_token() }}"> <br> <br> --}}
                
                <!--Update Button-->
                {{-- <button class="btn btn-primary btn">Update</button>
            </form> --}}
            
        {{-- </div>
    </div> --}} 


    <div class="d-flex bd-highlight mb-4" style="">
        <div class="d-flex flex-row ml-3" style="margin:30px;">
            <div class="p-2 bd-highlight">
                <img class="card-img-top" src="{{ asset($category->category_img) }}" style="width:390px; height:500px; margin:5px;">
            </div> 
            <div class="ml-auto p-2 bd-highlight">
                <div class="d-flex flex-row">
                    <div class="d-flex flex-row" style="">
                        <div class="col">

                            <form name="updateCategories" enctype="multipart/form-data" action="{{URL('/manager/category/' . $category->id)}}" method="post" id="form">
                                @csrf
                
                                <!--Update Category Name-->
                                <td><label for="categoryName" id="text-label">Category Name </label></td><br>
                                <td><input type="text" id="username" name="category_name" value="{{$category->category_name}}" placeholder="Input new category name" required></td><br>
                                @if($errors->first('category_name'))
                                    <div class="alert alert-danger">{{$errors->first('category_name')}}</div>
                                @endif
                
                                <!--Update Category Image-->
                                <td><label for="categoryImg" id="text-label">Category Image</label></td><br>
                                <input type="file" name="category_img">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}"> <br> <br>
                                
                                <!--Update Button-->
                                <button class="btn btn-primary btn">Update</button>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
