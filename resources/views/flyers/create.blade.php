
@extends('_layout')

@section('content')
    <h1>Selling Your Home?</h1>

    <form method="POST" action="/flyers" enctype="multipart/form-data" class="col-md-6">
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
    </form><hr>
    </div>
    <div class="container">
        <h1>Upload pictures of your house!</h1>
        <form action="/flyers" method="POST" class="dropzone">
            {{csrf_field()}}
        </form>
    </div>
@stop

@section('scripts.footer')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/4.2.0/dropzone.js"></script>
@stop