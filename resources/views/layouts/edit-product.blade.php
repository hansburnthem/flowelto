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

    <div class="d-flex bd-highlight mb-4" style="">
        <div class="d-flex flex-row ml-3" style="margin:30px;">
            <div class="p-2 bd-highlight">
                <img class="card-img-top" src="{{ asset($data_to_print->flower_img) }}" style="width:390px; height:500px; margin:5px;">
            </div> 
            <div class="ml-auto p-2 bd-highlight">
                <div class="d-flex flex-row">
                    <div class="d-flex flex-row" style="">
                        <div class="col">

                            @foreach($data_for_update as $f)
                                <form action="/viewProduct/update/{{$f->id}} " method="post">
                                    {{ csrf_field() }}
                                    <input type="hidden" name="id" value="{{ $f->id }}"> <br/>

                                    Flower Name <input type="text" required="required" name="name" value="{{ $f->flower_name }}"> <br/>
                                    Flower Price (Rupiah) <input type="number" required="required" name="price" value="{{ $f->flower_price }}"> <br/>
                                    Description <textarea required="required" name="description" value="">{{ $f->flower_desc }}</textarea><br/>
                                    {{-- Alamat <textarea required="required" name="flower_img">{{ $f->flower_img }}</textarea> <br/> --}}
                                    <input type="submit" class="btn btn-primary" value="Update">
                                </form>
                            @endforeach

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>



@endsection