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

    <form method="POST" action="/create/flower" enctype="multipart/form-data">
        @csrf
        <table>
            
            <tr>
                <td> <label for="">Category</label> </td> 
                <td>
                    <select name="flower_category_id" id="flower_category_id" class="form-control input-sm">
                        @foreach($category as $categorys)
                            <option value="{{$categorys->id}}" >{{$categorys->category_name}}</option>
                        @endforeach                   
                    </select>
                    <br>
                </td> 
            </tr>

            <tr>
                <td><label for=""> Flower Name </label></td>
                <td><input name="flower_name" type="text" class="form-control" id="flower_name"><br></td>
            </tr>

            <tr>
                <td><label for="">  Flower Price</label></td>
                <td>
                    <select name="flower_price" class="custom-select" id="flower_price" required>
                        <option selected disabled value=""></option>
                        <option value="100000">100000</option>
                        <option value="250000">250000</option>
                        <option value="500000">500000</option>
                        <option value="750000">750000</option>
                        <option value="1000000">1000000</option>
                    </select>
                    <br><br>
                </td> 
            </tr>

            <tr>
                <td><label for=""> Description </label></td>
                <td><textarea name="flower_desc" class="form-control" id="desc"></textarea><br></td>
            </tr>

            <tr>
                <td><label for=""> Flower Image </label></td>
                <td><input type="file" name="flower_img"></td>
            </tr>

            <tr>
                <td></td>
                <td>
                    <br><button type="submit" class="btn btn-primary">Add</button>
                </td>
            </tr>
        </table>
    </form>

@endsection