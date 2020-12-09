@extends('layouts.app')

@section('header')
    @component("components.meta", ["title" => "Manage Categories"])
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

    <h1>Add New Flower</h1>

    <form method="POST" action="" enctype="multipart/form-data"></form>
    <table>
        <tr>
            <td>Category</td>
            <td>:</td>
            <td><input type="text" name="category"></td>
        </tr>

        <tr>
            <td>Flower Name</td>
            <td>:</td>
            <td><input type="text" name="flower"></td>
        </tr>

        <tr>
            <td>Price</td>
            <td>:</td>
            <td><input type="text" name="price"></td>
        </tr>

        <tr>
            <td>Description</td>
            <td>:</td>
            <td><input type="text" name="description"></td>
        </tr>

        <tr>
            <td>Flower Image</td>
            <td>:</td>
            <td><input type="file" name="file"></td>
        </tr>

        <tr>
            <td></td>
            <td></td>
            <td><input type="submit" name="hasil" value="Add" class="btn btn-primary"></td>
        </tr>
    </table>

@endsection