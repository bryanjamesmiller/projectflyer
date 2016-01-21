
@extends('_layout')

@section('content')
    <div class="text-center header_bottom">
        <h1 class="white bg-info">Selling Your Home?</h1>
    </div>
        <form method="POST" action="/flyers" enctype="multipart/form-data">
            @include('flyers._form')

            @if(count($errors) > 0)
                <div class="alert alert-danger">
                    <ul>
                        @foreach($errors->all() as $error)
                            <li>{{$error}}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
        </form>
@stop

@section('scripts.footer')
    <script>
        $('body').css("background-image", "url('/images/background.jpg')");
    </script>
@stop