@extends('_layout')

@section('content')
    <div class="jumbotron">
        <h1>Project Flyer</h1>
        <p>If you'd like to create a cloud-based flyer for you to sell your home, then
        you've come to the right place!  Click "Create a Flyer" below or "Create a home listing" above to get started.</p>
        <a href="/flyers/create" class="btn btn-primary">Create a Flyer</a>
    </div>

@stop

@section('scripts.footer')
    <script type="text/javascript" src="http://rsvpify.dev/app/embed/2"></script>
    <script type="text/javascript" src="http://rsvpify.dev/app/js/iframeResizer.min.js"></script>
    <script type="text/javascript">iFrameResize({autoResize: true,heightCalculationMethod: 'max',enablePublicMethods: true}, "#RSVPifyIFrame");</script>

    <script>
        $('body').css("background-image", "url('/images/background.jpg')");
    </script>
@stop