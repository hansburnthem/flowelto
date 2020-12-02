@extends('layouts.app')

@section('header')
    @component("components.meta", ["title" => "Home"])
    @endcomponent
@endsection

@section('content')
<div class="mt-28 mx-5 py-5 px-10 md:mx-32 lg:mx-56 bg-white text-black rounded-2xl shadow-lg">
    @if (session('status'))
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
            </div>
        </div>
        @php
          Session::forget('status');
        @endphp
    @endif
    @if (session('error'))
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="alert alert-danger" role="alert">
                    {{ session('error') }}
                </div>
            </div>
        </div>
        @php
            Session::forget('status');
        @endphp
    @endif
    {{ __('You are logged in!') }}
</div>
@endsection
