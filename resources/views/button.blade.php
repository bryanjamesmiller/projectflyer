@extends('_layout')

@section('content')
    <div class="jumbotron">
        <h1>Project Flyer</h1>
        <p>If you'd like to create a cloud-based flyer for you to sell your home, then
            you've come to the right place!  Click "Create a Flyer" below or "Create a home listing" above to get started.</p>
        <a href="/flyers/create" class="btn btn-primary">Create a Flyer</a>
    </div>
    <div class="row">
        <div class="col-xs-12">
            <span id="liked_btn"><button id="vote" class="btn btn-default">Like</button></span>
            <div class="btn btn-default"><span id="number">{{$total_likes = 0}}</span>&nbsp;Total Likes</div>
    </div>
@stop

@section('scripts.footer')
    <script>
        $(document).ready(function(){

            $('#vote').click(function(e) {
                var url = "http://clothing.app/updateProductOption";
                var $post = {};

                $post.size =parseInt($("#number").text()) + 1;
                $("#number").text($post.size);
                $('#liked_btn').html('<button id="vote" class="btn btn-success">Liked!</button>')
            });
        });
    </script>
@stop