@inject('countries', 'App\Http\Utilities\Country')

@extends('_layout')

@section('content')
    <h1>Selling Your Home?</h1>
    <hr>
    <form method="POST" action="/flyers" enctype="multipart/form-data">
        @include('flyers._form')
    </form>
    <hr>

@stop