@extends('welcome')
@include('header')

@section('content')
    <h1 style="text-align:center;"> Welcome to Flowelto Shop</h1>
    <h5 style="text-align:center; margin-top:5px">The Best Flower Shop in Binus University</h5>
        <div class="card-deck d-flex justify-content-center">
            @foreach($category as $category_value)
            <a href="{{ $category_value->id }}">
                <div class="card" style="margin:30px; background-color:rgb(245, 215, 220);">
                    <img class="card-img-top" src="{{  asset("assets/$category_value->category_image") }}" style="width:390px; height:490px; margin:5px;">
                    <div class="card-body">
                    </div>      
                    <h4 class="card-title" style="text-align:center; color: black;">{{ $category_value->category_name }}</h4>
                </div>
            </a>
            @endforeach
        </div>
    <br>
    {{$category->links()}}
@endsection

