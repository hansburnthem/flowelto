<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    @yield('header')
</head>
@php
    $categories = \App\FlowerCategory::orderBy('category_name')->get();
@endphp


<body class="bg-gray-100 h-screen antialiased leading-none font-sans p-1">
    <!--Navbar-->
    <div class="absolute left-0 right-0 p-3 flex justify-between text-white rounded-2xl shadow-lg" style="background-color: rgb(255, 182, 195)">

        <!--TItle-->
        <div class="self-center">
            <a href="/" class="no-underline hover:underline text-xl italic duration-300 hover:text-black font-serif" style="color:white"><b>Flowelto Shop</b></a>
        </div>
        <button id="hamburgerMenu" class="block md:hidden z-20 focus:outline-none">
            @component ('components.icons', ['icon' => 'hamburger-menu', 'size'=>'6','hidden' => false])
            @endcomponent
            <div id="mobile-nav" class="hidden absolute w-full right-0 top-16 text-sm">
                <div class="overflow-hidden">
                    <div class="z-30 flex flex-row text-black ">
                        @auth
                            <div class="mx-1 bg-blue-500 text-white p-2 rounded-lg font-medium w-full">
                                <a href="#">{{ auth()->user()->username }}</a>
                            </div>
                            <form action="{{ route('logout') }}" method="post" id="logoutForm" class="mx-1 bg-blue-500 text-white p-2 rounded-lg font-medium w-full shadow-sm">
                                @csrf
                                <a id="logoutButton">Logout</a>
                            </form>
                        @endauth
                        @guest
                            <div class="mx-1 bg-blue-500 text-white p-2 rounded-lg font-medium w-full shadow-sm">
                                <a href="{{ route('login') }}">Login</a>
                            </div>
                            <div class="mx-1 bg-blue-500 text-white p-2 rounded-lg font-medium w-full shadow-sm">
                                <a href="{{ route('register') }}">Register</a>
                            </div>
                        @endguest
                        <div class="mx-1 bg-blue-500 text-white p-2 rounded-lg font-medium w-full shadow-sm">
                            <a href="">Categories</a>
                        </div>
                    </div>
                </div>
            </div>
        </button>

        <ul class="hidden md:flex items-center">

            <!--Category-->
            <div class="hidden md:flex items-center">
                <button id="categoryMenu" class="flex flex-row self-center focus:outline-none opacity-100 hover:opacity-50 focus:opacity-50 duration-300 mx-1 text-white p-2 rounded-lg font-medium w-full shadow-sm">
                    categories
                    @component ('components.icons', ['icon' => 'arrow-down', 'size'=>'4', 'hidden' => false])
                    @endcomponent
                </button>
                <div id="mobile-nav2" class="hidden absolute left-auto w-auto top-16 text-sm text-center">
                    <div class="rounded-lg shadow-lg ring-1 ring-black ring-opacity-5 overflow-hidden">
                        <div class="z-30 relative p-2 text-black flex flex-col " style="color: pink">
                            @if(count($categories))
                            @foreach($categories as $category)
                            <a href="{{URL('viewProduct/'. $category->id)}}" class="p-1 hover:bg-pink-300 hover:text-white duration-300 rounded-lg" style="color: black">{{ $category->category_name }}</a>
                            @endforeach
                            @else
                            <p>There's no categories</p>
                            @endif
                        </div>
                        
                    </div>
                </div>
            </div>

            <!--User Authentication to display navigation bar-->
            @auth
                <li class="px-2">
                    <button class="text-pink-500 opacity-100 hover:opacity-50 focus:opacity-50 duration-300 cursor-pointer focus:outline-none p-1 bg-white rounded-lg shadow-lg mx-1 p-2 rounded-lg font-medium w-full shadow-sm" onclick="profileMenu()">
                        {{ auth()->user()->username }}
                    </button>
                    <div id="mobile-nav3" class="hidden absolute right-auto w-auto top-16 text-sm text-center">
                        <div class="rounded-lg shadow-lg ring-auto ring-black ring-opacity-5 overflow-hidden">
                            <div class="z-30 relative p-2 text-black flex flex-col">

                                <!--Navbar for Manager-->
                                @if(auth()->user()->role->role_name == 'Manager')
                                    <a class="text-lg text-pink-300 border border-solid border-pink-300 rounded-lg" style="color:black" >Manager</a>
                                    <a href="{{ route('add_flower') }}" class="p-1 hover:bg-pink-300 hover:text-white duration-300 rounded-lg mt-1" style="color:black">Add Flower</a>
                                    <a href="{{ route('manager_categories') }}" class="p-1 hover:bg-pink-300 hover:text-white duration-300 rounded-lg" style="color:black">Manage Categories</a>
                                    <!--Navbar for Customer-->
                                    @elseif(auth()->user()->role->role_name == 'Customer')
                                    <a class="text-lg text-pink-300 border border-solid border-pink-300 rounded-lg" style="color:black">Customer</a>
                                    <a href="#" class="p-1 hover:bg-pink-300 hover:text-white duration-300 rounded-lg mt-1" style="color:black">My Cart</a>
                                    <a href="#" class="p-1 hover:bg-pink-300 hover:text-white duration-300 rounded-lg" style="color:black">Transaction History</a>
                                    @endif
                                    <a href="{{ route('change_password') }}" method="post" class="p-1 hover:bg-pink-300 hover:text-white duration-300 rounded-lg" style="color:black">Change Password</a>
                                    <form action="{{ route('logout') }}" method="post">
                                        @csrf
                                        <button class="p-1 hover:bg-pink-300 hover:text-white duration-300 rounded-lg mt-1">logout</button>
                                    </form>
                            </div>
                        </div>
                    </div>
                </li>
                {{-- <li class="px-2">
                    <div class="mx-1 text-white p-2 rounded-lg font-medium w-full shadow-sm">
                        <form action="{{ route('logout') }}" method="post">
                            @csrf
                            <button class="focus:outline-none no-underline hover:underline hover:text-white-400 duration-300">logout</button>
                        </form>
                    </div>
                </li> --}}
                <li class="pl-2">
                    <div class="mx-1 text-white p-2 rounded-lg font-medium w-full shadow-sm">
                        <span style="font-size: 15px; color: rgb(255, 255, 255);" class="ml-3">{{date ('D, d M Y')}}</span>
                    </div>
                </li>
            @endauth

            <!--Navbar for Guest-->
            @guest
                <li class="px-1 ">
                    <div class="mx-1 text-white p-2 rounded-lg font-medium w-full shadow-sm">
                        <a href="{{ route('login') }}" class="no-underline hover:underline" style="color:white" >login</a>
                    </div>
                </li>
                <li class="pl-2">
                    <div class="mx-1 text-white p-2 rounded-lg font-medium w-full shadow-sm">
                        <a href="{{ route('register') }}" class="no-underline hover:underline hover:text-white-400 duration-300" style="color:white">register</a>
                    </div>
                </li>
                <li class="pl-2">
                    <div class="mx-1 text-white p-2 rounded-lg font-medium w-full shadow-sm">
                        <span style="font-size: 15px; color: rgb(255, 255, 255);" class="ml-3">{{date ('D, d M Y')}}</span>
                    </div>
                </li>
            @endguest
        </ul>
    </div>

    <!--Style-->
    <div id="contentId" class="mt-32 md:mt-28 flex flex-col items-center">
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@200;600&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
        
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>

        @yield('content')
    </div>
<script>

    function profileMenu() {
        if (document.getElementById('mobile-nav3').classList.contains('hidden')){
            document.getElementById('mobile-nav3').classList.remove('hidden');
        }
        else {
            document.getElementById('mobile-nav3').classList.add('hidden');
        }
    };

    document.getElementById('hamburgerMenu').addEventListener('click', function () {
        if (document.getElementById('mobile-nav').classList.contains('hidden')){
            document.getElementById('mobile-nav').classList.remove('hidden');
            // document.getElementById('contentId').classList.remove('mt-32','md:mt-28');
        }
        else {
            document.getElementById('mobile-nav').classList.add("hidden");
            // document.getElementById('contentId').classList.add('mt-32','md:mt-28');
        }
    });

    document.getElementById('categoryMenu').addEventListener('click', function () {
        if (document.getElementById('mobile-nav2').classList.contains('hidden')){
            document.getElementById('mobile-nav2').classList.remove("hidden");
        }
        else {
            document.getElementById('mobile-nav2').classList.add("hidden");
        }
    });

    document.getElementById('logoutButton').addEventListener('click', function () {
       document.getElementById('logoutForm').submit();
    });
</script>
</body>
</html>
