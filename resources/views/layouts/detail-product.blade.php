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

    @if(Auth::user())
    <!--Product View for Manager-->
    @if(Auth::user()->role->role_name === 'Manager')
        <div class="d-flex bd-highlight mb-4" style="">
            <div class="d-flex flex-row ml-3" style="margin:30px;">
                <div class="p-2 bd-highlight">
                    <!--Get Flower Images-->
                    <img class="card-img-top" src="{{ asset($detail->flower_img) }}" style="width:390px; height:500px; margin:5px;">
                </div>
                <div class="ml-auto p-2 bd-highlight">
                    <div class="d-flex flex-row">
                        <div class="d-flex flex-row" style="">
                            <div class="col">
                                <!--Get Flower Name-->
                                <h1>{{ $detail-> flower_name }}</h1>
                                <!--Get Flower Price-->
                                <h5>Rp {{ $detail-> flower_price }}</h5><br> <br>
                                <!--Get Flower Description-->
                                <h5>Description:</h5> {{ $detail -> flower_desc }} <br> <br> <br>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    <!--Product View for Customer-->
    @elseif (Auth::user()->role->role_name === 'Customer')
        <div class="d-flex bd-highlight mb-4" style="">
            <div class="d-flex flex-row ml-3" style="margin:30px;">
                <div class="p-2 bd-highlight">
                    <!--Get Flower Images-->
                    <img class="card-img-top" src="{{ asset($detail->flower_img) }}" style="width:390px; height:500px; margin:5px;">
                </div>
                <div class="ml-auto p-2 bd-highlight">
                    <div class="d-flex flex-row">
                        <div class="d-flex flex-row" style="">
                            <div class="col">
                                <!--Get Flower Name-->
                                <h1>{{ $detail-> flower_name }}</h1>
                                <!--Get Flower Price-->
                                <h5>Rp {{ $detail-> flower_price }}</h5><br> <br>
                                <!--Get Flower Description-->
                                <h5>Description:</h5> {{ $detail -> flower_desc }} <br> <br> <br>

                                <!--From for add to cart-->
                                <form action="{{ route('detail_product', ['id'=>$detail->id]) }}" method="post">
                                    @csrf

                                    <span class="quick-drop resizeWidth">
                                        <input class="form-control" name="qty" type="number" min="1" value="1">
                                    </span> <br>
                                    <!--Add to cart button-->
                                    <button class="btn-area btn btn-primary btn-block" type="submit">
                                        Add to cart
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif

    <!--Product View for Guest-->
    @else
        <div class="d-flex bd-highlight mb-4" style="">
            <div class="d-flex flex-row ml-3" style="margin:30px;">
                <div class="p-2 bd-highlight">
                    <!--Get Flower Images-->
                    <img class="card-img-top" src="{{ asset($detail->flower_img) }}" style="width:390px; height:500px; margin:5px;">
                </div>
                <div class="ml-auto p-2 bd-highlight">
                    <div class="d-flex flex-row">
                        <div class="d-flex flex-row" style="">
                            <div class="col">
                                <!--Get Flower Name-->
                                <h1>{{ $detail-> flower_name }}</h1>
                                <!--Get Flower Price-->
                                <h5>Rp {{ $detail-> flower_price }}</h5><br> <br>
                                <!--Get Flower Description-->
                                <h5>Description:</h5> {{ $detail -> flower_desc }} <br> <br> <br>


                                    <span class="quick-drop resizeWidth">
                                        <input class="form-control" name="qty" type="number" min="1" value="1">
                                    </span> <br>
                                    <!--Add to cart button-->
                                    <a href="/register">
                                        <button class="btn-area btn btn-primary btn-block" type="submit">
                                            Add to cart
                                        </button>
                                    </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif


@endsection
