@extends('layouts.app')

@section('header')
    @component("components.meta", ["title" => "Register"])
    @endcomponent
@endsection

@section('content')
    <div class="flex justify-center">
        <div class="w-auto sm:w-72 md:w-80 bg-white p-5 rounded-2xl text-black shadow-lg">
            <form action="{{ route('register') }}" method="post">
                @csrf

                <div class="mb-4">
                    <label for="username" class="sr-only">Username</label>
                    <input type="text" name="username" id="username" placeholder="Username" class="bg-gray-100 border-2 w-full p-4 rounded-lg @error('username') border-red-500 @enderror" value="{{ old('username') }}">

                    @error('username')
                    <div class="text-red-500 mt-2 text-sm">
                        {{ $message }}
                    </div>
                    @enderror
                </div>

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
                    <input type="password" name="password" id="password" placeholder="Choose a password" class="bg-gray-100 border-2 w-full p-4 rounded-lg @error('password') border-red-500 @enderror" value="">

                    @error('password')
                    <div class="text-red-500 mt-2 text-sm">
                        {{ $message }}
                    </div>
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="password_confirmation" class="sr-only">Password again</label>
                    <input type="password" name="password_confirmation" id="password_confirmation" placeholder="Repeat your password" class="bg-gray-100 border-2 w-full p-4 rounded-lg @error('password_confirmation') border-red-500 @enderror" value="">

                    @error('password_confirmation')
                    <div class="text-red-500 mt-2 text-sm">
                        {{ $message }}
                    </div>
                    @enderror
                </div>

                <div class="mb-4 mr-2 text-center flex flex-col">
                    <span class="text-red-400 mb-2"><b>Gender</b></span>

                    <label for="gender">Select Gender</label>
                    <select name="gender" id="gender">
                        <option value="male">Male</option>
                        <option value="female">Female</option>
                    </select>

                    @error('password_confirmation')
                    <div class="text-red-500 mt-2 text-sm">
                        {{ $message }}
                    </div>
                    @enderror
                </div>

                <div class="mb-4 mx-auto text-center items-center flex flex-col">
                    <span class="text-red-400 mb-2"><b>Date of Birth</b></span>

                    <label for="dob" class="sr-only">DoB</label>
                    <input type="date" max="{{ \Carbon\Carbon::today()->toDateString() }}" name="dob" id="dob" placeholder="Choose a dob" class="bg-gray-100 border-2 w-full p-4 rounded-lg @error('dob') border-red-500 @enderror" value="{{ old('dob') }}">

                    @error('dob')
                    <div class="text-red-500 mt-2 text-sm">
                        {{ $message }}
                    </div>
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="address" class="sr-only">Username</label>
                    <input type="text" name="address" id="address" placeholder="Address" class="bg-gray-100 border-2 w-full h-32 p-4 rounded-lg @error('address') border-red-500 @enderror" value="{{ old('address') }}">

                    @error('address')
                    <div class="text-red-500 mt-2 text-sm">
                        {{ $message }}
                    </div>
                    @enderror
                </div>

                <div>
                    <button type="submit" class="bg-green-500 hover:opacity-80 duration-300 text-white px-4 py-3 rounded-xl font-medium w-full">Register</button>
                </div>
            </form>
        </div>
    </div>
@endsection
