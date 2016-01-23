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
            <span id="liked_btn"><button class="btn btn-default vote_btn"><span class="number">{{$total_likes = 7}}</span>&nbsp;Likes</button></span>
    </div>
@stop

@section('scripts.footer')
    <script>
        $(document).ready(function(){

            $('.vote_btn').click(function(e) {
                var url = "http://clothing.app/updateProductOption";
                var $post = {};
console.log($(this).find(".number").text());
                console.log($(".number").text());
                var newNum = parseInt($(".number").text()) + 1;

                console.log(typeof newNum);
                console.log(newNum);
                $(this).parent().html('<button id="vote" class="btn btn-success">' + newNum + ' Liked!</button>')
            });
        });
    </script>
@stop