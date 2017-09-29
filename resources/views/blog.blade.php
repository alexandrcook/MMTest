@include('parts.head')

<!-- Page Content -->
<div class="row">

    <!-- Blog Entries Column -->
    <div class="col-md-8">

        <h1 class="my-4">Welcome!
            <small>This is MMTestBlog</small>
        </h1>

    @foreach($posts as $post)

        <!-- Blog Post -->
            <div class="card mb-4">
                <div class="img-wrap" style="max-height: 300px; overflow: hidden">
                    <img class="card-img" src="/storage/images/posts/{{$post->file}}"
                         alt="Card image cap">
                </div>
                <div class="card-body">
                    <a href="{{route('post.show', ['id' => $post->id])}}">
                        <h2 class="card-title">{{$post->name}}</h2>
                    </a>
                    <b>
                        Posted @if($post->category()->first()) in - <a
                                href="{{route('category.show', ['id' => $post->category()->first()->id])}}">{{$post->category()->first()->name}}</a> @else
                            Without Category @endif
                    </b>
                    <hr>
                    <p class="card-text">{{$post->content}}</p>
                    <hr>
                    {{--<a href="#" class="btn btn-primary">Read More &rarr;</a>--}}
                </div>
                <div class="card-footer text-muted">
                    Posted on {{$post->created_at}}
                    {{--by--}}
                    {{--<a href="#">Start Bootstrap</a>--}}
                </div>
            </div>
    @endforeach

    <!-- Pagination -->
        <ul class="pagination justify-content-center mb-4">
            <li class="page-item">
                <a class="page-link" href="#">&larr; Older</a>
            </li>
            <li class="page-item disabled">
                <a class="page-link" href="#">Newer &rarr;</a>
            </li>
        </ul>

    </div>

    <!-- Sidebar Widgets Column -->
    <div class="col-md-4">

        <!-- Search Widget -->
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

    <!-- Post Widget -->
        <div class="card my-4">
            <h5 class="card-header">Latest Post</h5>
            <div class="card-body">
                <div class="row">
                    <div class="col">
                        <ul class="list-unstyled mb-0">
                            @foreach($posts as $post)
                                <li>
                                    <a class="" href="{{route('post.show', ['id' => $post->id])}}">
                                        {{$post->name}}
                                    </a>
                                    <hr>
                                </li>
                                @if($loop->iteration > 5)
                                    @break
                                @endif
                            @endforeach
                            <li>
                                <a class="btn btn-info" href="{{route('post.create')}}">
                                    Create new post
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <!-- Categories Widget -->
        <div class="card my-4">
            <h5 class="card-header">Categories</h5>
            <div class="card-body">
                <div class="row">
                    <div class="col">
                        <ul class="list-unstyled mb-0">
                            @foreach($categories as $category)
                                <li>
                                    <a class="" href="{{route('category.show', ['id' => $category->id])}}">
                                        {{$category->name}}
                                    </a>
                                    <hr>
                                </li>

                            @endforeach
                            <li>
                                <a class="btn btn-info" href="{{route('category.create')}}">
                                    Create new category
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>


        <!-- Side Widget -->
        <div class="card my-4">
            <h5 class="card-header">Side Widget</h5>
            <div class="card-body">
                You can put anything you want inside of these side widgets. They are easy to use, and feature the
                new Bootstrap 4 card containers!
            </div>
        </div>
    </div>
</div>
<!-- /.row -->

@include('parts.end')
