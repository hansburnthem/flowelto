<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@200;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>

    @yield('header')
</head>
@php
    $categories = \App\FlowerCategory::orderBy('category_name')->get();
@endphp
<body class="bg-gray-100 h-screen antialiased leading-none font-sans p-1">
    <div class="absolute left-0 right-0 top-5 mx-10 p-4 bg-green-500 flex justify-between text-white rounded-2xl shadow-lg md:mx-40 lg:mx-80">
        <div class="hidden md:flex items-center">
            <button id="categoryMenu" class="flex flex-row self-center focus:outline-none opacity-100 hover:opacity-50 focus:opacity-50 duration-300">
                categories
                @component ('components.icons', ['icon' => 'arrow-down', 'size'=>'4', 'hidden' => false])
                @endcomponent
            </button>
            <div id="mobile-nav2" class="hidden absolute left-0 w-auto top-16 text-sm text-center">
                <div class="rounded-lg shadow-lg ring-1 ring-black ring-opacity-5 overflow-hidden">
                    <div class="z-30 relative bg-white p-2 text-black flex flex-col">
                        @if(count($categories))
                            @foreach($categories as $category)
                                <a href="{{URL('viewProduct/'. $category->id)}}" class="p-1 hover:bg-green-500 hover:text-white duration-300 rounded-lg">{{ $category->category_name }}</a>
                            @endforeach
                        @else
                            <p>There's no categories</p>
                        @endif
                    </div>
                </div>
            </div>
        </div>
        <div class="self-center">
            <a href="/" class="no-underline hover:underline text-xl italic duration-300 hover:text-black font-serif"><b>{{ config('app.name') }}</b></a>
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
            @auth
                <li class="px-2">
                    <button class="text-green-500 opacity-100 hover:opacity-50 focus:opacity-50 duration-300 cursor-pointer focus:outline-none p-1 bg-white rounded-lg shadow-lg" onclick="profileMenu()">
                        {{ auth()->user()->username }}
                    </button>
                    <div id="mobile-nav3" class="hidden absolute right-20 w-auto top-16 text-sm text-center">
                        <div class="rounded-lg shadow-lg ring-1 ring-black ring-opacity-5 overflow-hidden">
                            <div class="z-30 relative bg-white p-2 text-black flex flex-col">
                                @if(auth()->user()->role->role_name == 'Manager')
                                    <a href="#" class="text-lg text-green-500 border border-solid border-green-500 rounded-lg">Manager</a>
                                    <a href="#" class="p-1 hover:bg-green-500 hover:text-white duration-300 rounded-lg mt-1">Add Flower</a>
                                    <a href="{{ route('manager_categories') }}" class="p-1 hover:bg-green-500 hover:text-white duration-300 rounded-lg">Manage Categories</a>
                                @elseif(auth()->user()->role->role_name == 'Customer')
                                    <a href="#" class="text-lg text-green-500 border border-solid border-green-500 rounded-lg">Customer</a>
                                    <a href="#" class="p-1 hover:bg-green-500 hover:text-white duration-300 rounded-lg mt-1">My Cart</a>
                                    <a href="#" class="p-1 hover:bg-green-500 hover:text-white duration-300 rounded-lg">Transaction History</a>
                                @endif
                                <a href="{{ route('change_password') }}" class="p-1 hover:bg-green-500 hover:text-white duration-300 rounded-lg">Change Password</a>
                            </div>
                        </div>
                    </div>
                </li>
                <li class="pl-2">
                    <form action="{{ route('logout') }}" method="post">
                        @csrf
                        <button class="focus:outline-none no-underline hover:underline hover:text-pink-400 duration-300">logout</button>
                    </form>
                </li>
            @endauth
            @guest
                <li class="px-2">
                    <a href="{{ route('login') }}" class="no-underline hover:underline">login</a>
                </li>
                <li class="pl-2">
                    <a href="{{ route('register') }}" class="no-underline hover:underline hover:text-pink-400 duration-300">register</a>
                </li>
            @endguest
        </ul>
    </div>
    <div id="contentId" class="mt-32 md:mt-28 flex flex-col items-center">
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
