@include('parts.head')

<!-- Page Content -->
<div class="row">
    <!-- Post Content Column -->
    <div class="col-lg-8">
        <!-- Title -->
        <h1 class="my-3">{{$post->name}}</h1>
        <hr>
        <!-- Category -->
        <h3 class="my-3">
            @if($post->category()->first()) <a
                    href="{{route('category.show', ['id' => $post->category()->first()->id])}}">{{$post->category()->first()->name}}</a> @else
                Without Category @endif
        </h3>

        <!-- Author -->
        <p class="lead">
            {{--by--}}
            {{--<a href="#">Start Bootstrap</a>--}}
        </p>
        <hr>
        <!-- Date/Time -->
        <p>Posted on {{$post->created_at}}</p>
        <hr>
        <!-- Preview Image -->
        <img class="img-fluid rounded" src="/storage/images/posts/{{$post->file}}" alt="post img">
        <hr>
        <!-- Post Content -->
        <p class="lead">
            {{$post->content}}
        </p>
        <hr>

        <!-- Edit / Delete -->
        <div class="form-group row">
            <div class="col">
                <a class="btn btn-info" href="{{route('post.edit', ['id' => $post->id])}}">Edit</a>

                <form class="d-inline" action="{{route('post.del', ['id' => $post->id])}}" method="post">
                    {{ csrf_field() }}
                    <input type="hidden" name="_method" value="DELETE">
                    <input type="submit" class="btn btn-danger" value="Destroy">
                </form>
            </div>
        </div>

        <hr>
        <!-- Comments Form -->
        <div class="card my-4">
            <h5 class="card-header">Leave a Comment:</h5>
            <div class="card-body">
                <div id="comment-errors">
                </div>
                <form action="{{route('comment')}}" method="post">
                    {{ csrf_field() }}
                    <input style="display: none" type="reset">
                    <input type="hidden" name="post_id" value="{{$post->id}}">
                    <div class="form-group">
                        <input class="form-control" type="text" name="author">
                    </div>
                    <div class="form-group">
                        <textarea class="form-control" rows="3" name="content"></textarea>
                    </div>
                    <input type="submit" class="btn btn-outline-info" id="ajax-leave-comment">
                </form>
            </div>
        </div>

        <div id="response-text">

        </div>

        <!-- Comments -->
        <div id="post-comments">
            @foreach($post->comments()->orderBy('created_at', 'desc')->get() as $comment)
                <div class="media mb-4">
                    <img class="d-flex mr-3 rounded-circle" src="http://placehold.it/50x50" alt="">
                    <div class="media-body">
                        <h5 class="mt-0 d-inline">{{$comment->author}}</h5> <span>(at {{$comment->created_at}})</span>
                        <p>
                        {{$comment->content}}
                        </p>
                    </div>
                </div>
            @endforeach
        </div>

        {{--<!-- Comment with nested comments -->--}}
        {{--<div class="media mb-4">--}}
        {{--<img class="d-flex mr-3 rounded-circle" src="http://placehold.it/50x50" alt="">--}}
        {{--<div class="media-body">--}}
        {{--<h5 class="mt-0">Commenter Name</h5>--}}
        {{--Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.--}}

        {{--<div class="media mt-4">--}}
        {{--<img class="d-flex mr-3 rounded-circle" src="http://placehold.it/50x50" alt="">--}}
        {{--<div class="media-body">--}}
        {{--<h5 class="mt-0">Commenter Name</h5>--}}
        {{--Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.--}}
        {{--</div>--}}
        {{--</div>--}}

        {{--<div class="media mt-4">--}}
        {{--<img class="d-flex mr-3 rounded-circle" src="http://placehold.it/50x50" alt="">--}}
        {{--<div class="media-body">--}}
        {{--<h5 class="mt-0">Commenter Name</h5>--}}
        {{--Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.--}}
        {{--</div>--}}
        {{--</div>--}}

        {{--</div>--}}
        {{--</div>--}}

    </div>

    <!-- Sidebar Widgets Column -->
    {{--<div class="col-md-4">--}}

    {{--<!-- Search Widget -->--}}
    {{--<div class="card my-4">--}}
    {{--<h5 class="card-header">Search</h5>--}}
    {{--<div class="card-body">--}}
    {{--<div class="input-group">--}}
    {{--<input type="text" class="form-control" placeholder="Search for...">--}}
    {{--<span class="input-group-btn">--}}
    {{--<button class="btn btn-secondary" type="button">Go!</button>--}}
    {{--</span>--}}
    {{--</div>--}}
    {{--</div>--}}
    {{--</div>--}}

    {{--<!-- Categories Widget -->--}}
    {{--<div class="card my-4">--}}
    {{--<h5 class="card-header">Categories</h5>--}}
    {{--<div class="card-body">--}}
    {{--<div class="row">--}}
    {{--<div class="col-lg-6">--}}
    {{--<ul class="list-unstyled mb-0">--}}
    {{--<li>--}}
    {{--<a href="#">Web Design</a>--}}
    {{--</li>--}}
    {{--<li>--}}
    {{--<a href="#">HTML</a>--}}
    {{--</li>--}}
    {{--<li>--}}
    {{--<a href="#">Freebies</a>--}}
    {{--</li>--}}
    {{--</ul>--}}
    {{--</div>--}}
    {{--<div class="col-lg-6">--}}
    {{--<ul class="list-unstyled mb-0">--}}
    {{--<li>--}}
    {{--<a href="#">JavaScript</a>--}}
    {{--</li>--}}
    {{--<li>--}}
    {{--<a href="#">CSS</a>--}}
    {{--</li>--}}
    {{--<li>--}}
    {{--<a href="#">Tutorials</a>--}}
    {{--</li>--}}
    {{--</ul>--}}
    {{--</div>--}}
    {{--</div>--}}
    {{--</div>--}}
    {{--</div>--}}

    {{--<!-- Side Widget -->--}}
    {{--<div class="card my-4">--}}
    {{--<h5 class="card-header">Side Widget</h5>--}}
    {{--<div class="card-body">--}}
    {{--You can put anything you want inside of these side widgets. They are easy to use, and feature the new Bootstrap 4 card containers!--}}
    {{--</div>--}}
    {{--</div>--}}
    {{--</div>--}}
</div>
<!-- /.row -->


@include('parts.end')
