@extends('_layout')

@section('content')
    @foreach($flyers as $flyer)
    <div class="jumbotron">
        <h1>Project Flyer</h1>
        <p>If you'd like to create a cloud-based flyer for you to sell your home, then
            you've come to the right place!  Click "Create a Flyer" below or "Create a home listing" above to get started.</p>
        <a href="/flyers/create" class="btn btn-primary">Create a Flyer</a>
    </div>
    <div class="row">
        <div class="col-xs-12">
            <span id="liked_btn"><button class="btn btn-default vote_btn"><span class="number">{{$flyer->numOfLikes}}</span>&nbsp;Likes</button></span>
        </div>
    </div>
    <hr>
    <hr>
    @endforeach
@stop

@section('scripts.footer')
    <script>
        $(document).ready(function(){

            $('.vote_btn').click(function(e) {
                var url = "/button";
                var $post = {};
                var newNum = parseInt($(this).find(".number").text()) + 1;
                $post.size = newNum;
                $(this).parent().html('<button id="vote" class="btn btn-success">' + newNum + ' Liked!</button>');

                $.ajax({
                    type: "POST",
                    url: url,
                    data: $post,
                    cache: false,
                    success: function(data){
                        return data;
                    }
                });
            });
        });
    </script>
@stop