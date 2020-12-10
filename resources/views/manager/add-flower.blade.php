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

    {{-- <h1>Add New Flower</h1>

    <form method="POST" action="" enctype="multipart/form-data"></form>
    <table>
        <tr>
            <td>Category</td>
            <td>:</td>
            <td><input type="text" name="category"></td>
        </tr>

        <tr>
            <td>Flower Name</td>
            <td>:</td>
            <td><input type="text" name="flower"></td>
        </tr>

        <tr>
            <td>Price</td>
            <td>:</td>
            <td><input type="text" name="price"></td>
        </tr>

        <tr>
            <td>Description</td>
            <td>:</td>
            <td><input type="text" name="description"></td>
        </tr>

        <tr>
            <td>Flower Image</td>
            <td>:</td>
            <td><input type="file" name="file"></td>
        </tr>

        <tr>
            <td></td>
            <td></td>
            <td><input type="submit" name="hasil" value="Add" class="btn btn-primary"></td>
        </tr>
    </table> --}}


    <form method="POST" action="/create/flower" class="mt-5" enctype="multipart/form-data">
        @csrf
        <table>
            
            <tr>
                <td><label for="category">Category</label><br><br> </td> 
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
                <td><label for="flower_name">Flower Name</label><br><br></td>
                <td><input name="flower_name" type="text" class="form-control" id="flower_name"><br></td>
            </tr>

            <tr>
                <td><label for="flower_price">Flower Price </label><br><br> </td>
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
                <td><label for="desc">Description</label><br><br></td>
                <td><textarea name="flower_desc" class="form-control" id="desc" rows="3"></textarea><br></td>
            </tr>

            <tr>
                <td><label for="img">Flower Images</label><br><br></td>
                <td><input type="file" name="flower_img"><br><br></td>
            </tr>

            <tr>
                <td>
                    <button type="submit" class="btn btn-primary">Add</button>
                </td>
            </tr>
        </table>
    </form>

@endsection