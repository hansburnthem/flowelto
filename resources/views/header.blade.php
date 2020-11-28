<link rel="stylesheet" href="{{asset('css/nav_bar.css')}}">

<div class="d-flex bd-highlight mb-4" style="background-color:pink">
        
        <div class="p-2 bd-highlight">
            <h4>
                <span class="logo">Flowelto Shop</span>
            </h4>
        </div>

        
        <div class="ml-auto p-2 bd-highlight">
            <button class="btn dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Categories
            </button>
            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                <div class="d-flex flex-column">
                    @foreach($allCategory as $category_value)
                        <a href="{{$category_value->id}}" style="font-size: 15px; color: black; margin:10px;">{{ $category_value->category_name }}</a>
                    @endforeach
                </div>
            </div>
            <a href="{{URL('login')}}" style="font-size: 15px; color: black;" class="ml-3">Login</a>
            <a href="{{URL('register')}}" style="font-size: 15px; color: black;" class="ml-3">Register</a>
            <span style="font-size: 15px; color: black;" class="ml-3">{{date ('D, d M Y')}}</span>
        </div>
</div>