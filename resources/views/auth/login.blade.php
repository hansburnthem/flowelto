@extends('layouts.app')

@section('header')
    @component("components.meta", ["title" => "Login"])
    @endcomponent
@endsection

@section('content')
    <div class="flex justify-center">
        <div class="w-auto sm:w-72 md:w-80 bg-white p-5 rounded-2xl text-black shadow-lg">
            @if (session('status'))
                <div class="p-2 w-auto rounded-xl text-red-700 bg-red-100 border border-red-300 flex flex-row mb-2">
                    @component ('components.icons', ['icon' => 'error', 'size'=>'5','hidden' => false])
                    @endcomponent
                    <div class="text-sm text-center ml-1">
                        {{ session('status') }}
                    </div>
                </div>
                @php
                    Session::forget('status');
                @endphp
            @endif

            <form action="{{ route('login') }}" method="post">
                @csrf

                <div class="mb-4">
                    <label for="email" class="sr-only">Email</label>
                    <input type="text" name="email" id="email" placeholder="Your email" class="bg-gray-100 border-2 w-full p-4 rounded-lg @error('email') border-red-500 @enderror" value="{{ old('email') }}">

                    @error('email')
                    <div class="text-red-500 mt-2 text-sm">
                        {{ $message }}
                    </div>
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="password" class="sr-only">Password</label>
                    <input type="password" name="password" id="password" placeholder="Your password" class="bg-gray-100 border-2 w-full p-4 rounded-lg @error('password') border-red-500 @enderror" value="">

                    @error('password')
                    <div class="text-red-500 mt-2 text-sm">
                        {{ $message }}
                    </div>
                    @enderror
                </div>

                <div class="mb-4">
                    <div class="flex items-center">
                        <input type="checkbox" name="remember" id="remember" class="mr-2">
                        <label for="remember">Remember me</label>
                    </div>
                </div>

                <div>
                    <button type="submit" class="bg-blue-500 text-white px-4 py-3 rounded-xl font-medium w-full">Login</button>
                </div>
            </form>
        </div>
    </div>
@endsection
