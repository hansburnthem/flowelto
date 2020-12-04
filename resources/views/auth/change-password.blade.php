@extends('layouts.app')

@section('header')
    @component("components.meta", ["title" => "Change Password"])
    @endcomponent
@endsection

@section('content')
    <div class="flex justify-center">
        <div class="w-auto sm:w-72 md:w-80 bg-white p-5 rounded-2xl text-black shadow-lg">
            <form action="{{ route('change_password') }}" method="post">
                @csrf
                @method('PUT')
                <div class="mb-4">
                    <label for="old_password" class="sr-only">Current Password</label>
                    <input type="password" name="old_password" id="old_password" placeholder="Current password" class="bg-gray-100 border-2 w-full p-4 rounded-lg @error('old_password') border-red-500 @enderror" value="">

                    @error('old_password')
                    <div class="text-red-500 mt-2 text-sm">
                        {{ $message }}
                    </div>
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="new_password" class="sr-only">New Password</label>
                    <input type="password" name="new_password" id="new_password" placeholder="New password" class="bg-gray-100 border-2 w-full p-4 rounded-lg @error('new_password') border-red-500 @enderror" value="">

                    @error('new_password')
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

                <div>
                    <button type="submit" class="bg-green-500 hover:opacity-80 duration-300 text-white px-4 py-3 rounded-xl font-medium w-full">Change Password</button>
                </div>
            </form>
        </div>
    </div>
@endsection
