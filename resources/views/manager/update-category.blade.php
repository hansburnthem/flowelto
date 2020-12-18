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

    <div class="container">
        <div class="card mb-3" style="max-width: 100%;">
            <div class="row no-gutters">
                <div class="col-md-5">
                    <!--Display category Image-->
                    <img src="{{ asset($category->category_img) }}" class="card-img" style="width:330px; height:430px; margin:5px;">
                </div>

                <div class="col-md-6">
                    <div class="card-body">
                        <br>
                        <!--Edit category form-->
                        <form method="POST" action="{{URL('/manager/category/' . $category->id)}}" class="mt-5" enctype="multipart/form-data">
                            @csrf
                            <table align="center">
                                <tr>
                                    <!--Input new category name-->
                                    <td><label for="category_name">Category Name</label></td>
                                    <td><input name="category_name" type="text" class="form-control" id="category_name" value={{$category->category_name}}><br></td>
                                </tr>

                                <tr>
                                    <!--Input new category image-->
                                    <td><label for="categoryImg">Category Image</label></td>
                                    <td><input type="file" name="category_img"></td>
                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                </tr>

                                <tr>
                                    <td></td>
                                    <td>
                                        <!--Submit data to update category-->
                                        <br><button class="btn btn-primary btn">Update</button>
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
