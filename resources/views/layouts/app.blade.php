<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    @yield('header')
</head>
@php
    $categories = \App\FlowerCategory::get();
@endphp
<body class="bg-gray-100 h-screen antialiased leading-none font-sans p-1">
    <div class="absolute left-0 right-0 top-5 mx-10 p-4 bg-green-500 flex justify-between text-white rounded-2xl shadow-lg md:mx-40 lg:mx-80">
        <div class="hidden lg:flex items-center">
            <button id="categoryMenu" class="flex flex-row self-center focus:outline-none animate-bounce">
                Categories
                @component ('components.icons', ['icon' => 'arrow-down', 'size'=>'4', 'hidden' => false])
                @endcomponent
                <div id="mobile-nav2" class="hidden absolute w-56 left-0 top-16 text-sm">
                    <div class="rounded-lg shadow-lg ring-1 ring-black ring-opacity-5 overflow-hidden">
                        <div class="z-30 relative bg-white p-1 text-black">
                            @if(count($categories))
                            <ul>
                                @foreach($categories as $category)
                                    <li class="mb-1">
                                        <a href="#">{{ $category->category_name }}</a>
                                    </li>
                                @endforeach
                            </ul>
                            @else
                                <p>There's no categories</p>
                            @endif
                        </div>
                    </div>
                </div>
            </button>
        </div>
        <div class="self-center">
            <a href="/" class="no-underline hover:underline text-xl italic duration-300 hover:text-black"><b>{{ config('app.name') }}</b></a>
        </div>
        <button id="hamburgerMenu" class="block lg:hidden z-20 focus:outline-none">
            @component ('components.icons', ['icon' => 'hamburger-menu', 'size'=>'6','hidden' => false])
            @endcomponent
            <div id="mobile-nav" class="hidden absolute w-20 right-0 top-16 text-sm">
                <div class="rounded-lg shadow-lg ring-1 ring-black ring-opacity-5 overflow-hidden">
                    <div class="z-30 relative bg-white p-1 text-black">
                       <ul>
                           <li>
                               Puki ayam
                           </li>
                           <li>
                               Puki ayam 2
                           </li>
                       </ul>
                    </div>
                </div>
            </div>
        </button>
        <ul class="hidden lg:flex items-center">
            @auth
                <li class="px-2">
                    <b>{{ auth()->user()->username }}</b>
                </li>
                <li class="pl-2">
                    <form action="{{ route('logout') }}" method=POST>
                        @csrf
                        <button>Logout</button>
                    </form>
                </li>
            @endauth
            @guest
                <li class="px-2">
                    <a href="{{ route('login') }}" class="no-underline hover:underline">Login</a>
                </li>
                <li class="pl-2">
                    <a href="{{ route('register') }}" class="no-underline hover:underline hover:text-pink-400 duration-300">Register</a>
                </li>
            @endguest
        </ul>
    </div>
    <div class="mt-28 mx-5 py-5 px-10 bg-white flex justify-between text-black rounded-2xl shadow-lg md:mx-32 lg:mx-56">
        @yield('content')
    </div>
<script>
    document.getElementById('hamburgerMenu').addEventListener('click', function () {
        if (document.getElementById('mobile-nav').classList.contains('hidden')) document.getElementById('mobile-nav').classList.remove("hidden");
        else document.getElementById('mobile-nav').classList.add("hidden");
    });

    document.getElementById('categoryMenu').addEventListener('click', function () {
        if (document.getElementById('mobile-nav2').classList.contains('hidden')){
            document.getElementById('categoryMenu').classList.remove("animate-bounce");
            document.getElementById('mobile-nav2').classList.remove("hidden");
        }
        else {
            document.getElementById('mobile-nav2').classList.add("hidden");
            document.getElementById('categoryMenu').classList.add("animate-bounce");
        }
    });
</script>
</body>
</html>
