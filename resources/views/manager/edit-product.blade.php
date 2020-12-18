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

    <br>
    <div class="container">
        <div class="card">
            <div class="row no-gutters" style="background-color: pink">

                <div class="col-md-5">
                    <!--Display flower Image-->
                    <img src="{{asset($data->flower_img)}}" class="card-img" style="width:330px; height:430px; margin:5px;">
                </div>

                <div class="col-md-6">
                    <div class="card-body">
                        <br>
                        <!--Edit product form-->
                        <form method="POST" action="/viewProduct/update/{{$data->id}}" enctype="multipart/form-data">
                            @csrf
                            <table align="center">
                                <tr>
                                    <td><label for="category">Category</label></td>
                                    <td>
                                        <!--Select Category Option-->
                                        <select name="flower_category_id" id="flower_category_id" class="form-control input-sm">
                                            @foreach($category as $categorys)
                                                <option value="{{$categorys->id}}" 
                                                    @if($categorys->id == $data->flower_category_id)
                                                        selected
                                                    @endif
                                                >{{$categorys->category_name}}
                                                </option>
                                            @endforeach
                                        </select>
                                        <br>
                                    </td>
                                    <br>
                                </tr>

                                <tr>
                                    <!--Input new flower name-->
                                    <td><label for="flower_name">Flower Name</label></td>
                                    <td><input name="flower_name" type="text" class="form-control" id="flower_name" value={{$data->flower_name}}><br></td>
                                </tr>

                                <tr>
                                    <!--Input new flower price-->
                                    <td><label for="flower_price">Flower Price (Rupiah)</label></td>
                                    <td>
                                        <!--Price Option-->
                                        <select name="flower_price" class="custom-select" id="flower_price" required>
                                            <option selected disabled value=""></option>
                                            <option value="50000" @if($data->flower_price == 50000) selected @endif>50000</option>
                                            <option value="100000" @if($data->flower_price == 100000) selected @endif>100000</option>
                                            <option value="250000" @if($data->flower_price == 250000) selected @endif>250000</option>
                                            <option value="500000" @if($data->flower_price == 500000) selected @endif>500000</option>
                                            <option value="1000000" @if($data->flower_price == 1000000) selected @endif>1000000</option>

                                            <option value="{{$data->flower_price}}" 
                                                @if($data->flower_price == $data->flower_price) selected @endif>{{$data->flower_price}}
                                            </option>
                                            
                                        </select>
                                        <br><br>
                                    </td> 
                                </tr>

                                <tr>
                                    <!--Input new flower description-->
                                    <td><label>Description</label></td>
                                    <td><textarea name="flower_desc" class="form-control">{{$data->flower_desc}}</textarea><br></td>
                                </tr>

                                <tr>
                                    <!--Choose new flower image-->
                                    <td><label>Flower Image</label></td>
                                    <td><input type="file" name="flower_img"></td>
                                </tr>

                                <tr>
                                    <td></td>
                                    <td>
                                        <!--Submit data to update flower-->
                                        <br><button type="submit" class="btn btn-primary" >Update</button>
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