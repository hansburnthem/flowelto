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

    {{-- <div class="d-flex bd-highlight mb-4" style="">
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
    </div> --}}



    <div class="container mt-5">
        <div class="card mb-3" style="max-width: 100%;">
            <div class="row no-gutters">
                <div class="col-md-4">
                    <img src="{{ asset($category->category_img) }}" class="card-img" style="width:90%;height:100%">
                </div>
                <div class="col-md-8">
                    <div class="card-body">
                        <form method="POST" action="{{URL('/manager/category/' . $category->id)}}" class="mt-5" enctype="multipart/form-data">
                            @csrf
                            <table align="center">
                                <tr>
                                    <td><label for="category_name">Category Name</label><br></td>
                                    <td><input name="category_name" type="text" class="form-control" id="category_name" value={{$category->category_name}}><br></td>
                                    @if($errors->first('category_name'))
                                        <div class="alert alert-danger">{{$errors->first('category_name')}}</div>
                                    @endif
                                </tr>

                                <tr>
                                    <td><label for="categoryImg" id="text-label">Category Image</label><br><br></td>
                                    <td><input type="file" name="category_img"><br><br></td>
                                    <input type="hidden" name="_token" value="{{ csrf_token() }}"> <br> <br>
                                </tr>

                                <tr>
                                    <td>
                                        <div class="container bg-light">
                                            <div class="col-md-12 text-center">
                                                <button class="btn btn-primary btn">Update</button>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            </table>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
