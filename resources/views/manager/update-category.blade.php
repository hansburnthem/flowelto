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

            <form name="updateCategories" enctype="multipart/form-data" action="{{URL('/manager/category/' . $category->id)}}" method="post" id="form">
                @csrf

                <!--Update Category Name-->
                <td><label for="categoryName" id="text-label">Category Name </label></td><br>
                <td><input type="text" id="username" name="category_name" value="{{$category->category_name}}" placeholder="Input new category name" required></td><br>
                @if($errors->first('category_name'))
                    <div class="alert alert-danger">{{$errors->first('category_name')}}</div>
                @endif

                <!--Update Category Image-->
                <td><label for="categoryImage" id="text-label">Category Image</label></td><br>
                <input type="file" name="category_image">
                <input type="hidden" name="_token" value="{{ csrf_token() }}"> <br> <br>
                
                <!--Update Button-->
                <button class="btn btn-primary btn">Update</button>
            </form>
            
        </div>
    </div>
@endsection
