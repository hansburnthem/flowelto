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
    
    <!--Title-->
    <h1 names="category" style="text-align: center;" class="text-center text-5xl mb-5 italic underline font-serif">Our {{ $category->category_name }} (Gift)</h1>

    <!--Form for select flower and search products-->
    <div class="container">
        <div class="row justify-content-start">
          <div class="col-2">
            <td class="align-baseline">
                <form class="align-baseline" action=" " method="">
                    <!--Option to view all flowers in a category-->
                    <select class="form-control form-control-sm">
                        <option>Name</option>
                        @foreach($flowers as $f)
                            <option>{{ $f->flower_name }}</option>
                        @endforeach
                    </select>
                </form>
          </div>
          <!--Search data-->
          <div class="col-2">
            <input class="form-control" type="search" placeholder="Search" aria-label="Search">
          </div>
          <!--Search button-->
          <div class="col-2">
            <button class="btn btn-outline-success" type="submit">Search</button>
          </div>
        </div>
    </div>


    @if(Auth::user())
    
    <!--Product View for Manager-->
    @if(Auth::user()->role->role_name === 'Manager')

            <!--Data of flowers (Image, Name, Price) and button (Delete, Update)-->
            <div class="card-deck d-flex justify-content-center">
                @foreach($flowers as $f)
                <a href="{{ route('detail_product', ['id'=>$f->id]) }}">
                    <div class="card-deck">

                        <div class="card" style="margin:30px; background-color:rgb(245, 215, 220);">
                            <img class="card-img-top" src="{{ asset('storage/'. $f->flower_img) }}" style="width:390px; height:490px; margin:5px;">
                            <div class="card-body">
                                <h3 class="card-title" style="text-align:center; color: black;">{{ $f->flower_name }}</h3>
                                <h5 class="card-title" style="text-align:center; color: black;">Rp {{ $f->flower_price }}</h5>
                            </div>  

                            <div class="card-footer d-flex justify-content-center margin">
                                <!-----------------------------------------Masih error di DELTE DAN UPDATE------------------------------------------------>
                                <form class="text-black cursor-pointer hover:opacity-90 duration-300 btn btn-primary"
                                  action="{{ route('view_product', ['id'=>$f->id]) }}" method="post" onclick="this.submit()">
                                @csrf
                                @method('DELETE')
                                <input type="hidden" name="id" value="{{ $f->id }}">
                                    Delete
                                </form>

                                <a href="{{ route('view_product', ['id'=>$f->id]) }}" class="text-black cursor-pointer hover:opacity-90 duration-300 btn btn-danger">
                                    Update
                                </a>
                            </div> 
                        </div>
                        
                    </div>
                </a>
                @endforeach
            </div>
            {{$flowers->links()}}


        <!--Product View for Customer-->
        @elseif (Auth::user()->role->role_name === 'Customer')

             <!--Data of flowers (Image, Name, Price) and button (Delete, Update)-->
            <div class="card-deck d-flex justify-content-center">
                @foreach($flowers as $f)
                <a href="#">
                    <div class="card-deck">
                        <div class="card" style="margin:30px; background-color:rgb(245, 215, 220);">
                            <img class="card-img-top" src="{{ asset('storage/'. $f->flower_img) }}" style="width:390px; height:490px; margin:5px;">
                            <div class="card-body">
                                <h1 class="card-title" style="text-align:center; color: black;">{{ $f->flower_name }}</h1>
                                <h1 class="card-title" style="text-align:center; color: black;">Rp {{ $f->flower_price }}</h1>
                            </div>  
                        </div>
                    </a>
                    </div>
                @endforeach
            </div>
            {{$flowers->links()}}
        @endif

        <!--Product View for Guest-->
        @else
            <!--Data of flowers (Image, Name, Price) and button (Delete, Update)-->
            <div class="card-deck d-flex justify-content-center">
                @foreach($flowers as $f)
                <a href="#">
                    <div class="card-deck">
                        <div class="card" style="margin:30px; background-color:rgb(245, 215, 220);">
                            <img class="card-img-top" src="{{ asset('storage/'. $f->flower_img) }}" style="width:390px; height:490px; margin:5px;">
                            <div class="card-body">
                                <h1 class="card-title" style="text-align:center; color: black;">{{ $f->flower_name }}</h1>
                                <h1 class="card-title" style="text-align:center; color: black;">Rp {{ $f->flower_price }}</h1>
                            </div>    
                        </div>
                    </a>
                    </div>
                @endforeach
            </div>
            {{$flowers->links()}}
    @endif

@endsection