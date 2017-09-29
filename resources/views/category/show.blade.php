@include('parts.head')

<h4 class="my-4">Category - "{{$category->name}}"</h4>

<div class="form-group row">
    <div class="col-2">
        Name :
    </div>
    <div class="col-6">
        {{$category->name}}
    </div>
</div>
<div class="form-group row">
    <div class="col-2">
        Description :
    </div>
    <div class="col-6">
        {{$category->description}}
    </div>
</div>

<div class="form-group row">
    <div class="col">
        <a class="btn btn-info" href="{{route('category.edit', ['id' => $category->id])}}">Edit</a>

        <form class="d-inline" action="{{route('category.del', ['id' => $category->id])}}" method="post">
            {{ csrf_field() }}
            <input type="hidden" name="_method" value="DELETE">
            <input type="submit" class="btn btn-danger" value="Destroy">
        </form>
    </div>
</div>

<h4 class="my-4">All posts in category - "{{$category->name}}"</h4>

<div class="row">
@foreach($category->posts as $post)

    <div class="col-4">
    <!-- Blog Post -->
    <div class="card mb-4">
        <div class="img-wrap" style="max-height: 300px; overflow: hidden">
            <img class="card-img" src="/storage/images/posts/{{$post->file}}"
                 alt="Card image cap">
        </div>
        <div class="card-body">
            <a href="{{route('post.show', ['id' => $post->id])}}"><h2
                        class="card-title">{{$post->name}}</h2></a>
            <p class="card-text">{{$post->content}}</p>
            {{--<a href="#" class="btn btn-primary">Read More &rarr;</a>--}}
        </div>
        <div class="card-footer text-muted">
            Posted on {{$post->created_at}}
            {{--by--}}
            {{--<a href="#">Start Bootstrap</a>--}}
        </div>
    </div>
    </div>

@endforeach
</div>

@include('parts.end')
