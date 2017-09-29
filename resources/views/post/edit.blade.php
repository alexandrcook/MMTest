@include('parts.head')

<h2 class="my-4">Post edit</h2>

<form action="{{route('post.upd', ['id' => $post->id])}}" method="post" enctype="multipart/form-data">

    {{ csrf_field() }}
    <input type="hidden" name="_method" value="PUT">

    <div class="form-group row">
        <label for="example-1" class="col-2 col-form-label">Name</label>
        <div class="col-10">
            <input class="form-control" type="text" id="example-1" name="name" value="{{$post->name}}">
        </div>
    </div>
    <div class="form-group row">
        <label for="example-2" class="col-2 col-form-label">Content</label>
        <div class="col-10">
            <textarea style="height: 200px" class="form-control" type="text" id="example-2"
                      name="content">{{$post->content}}</textarea>
        </div>
    </div>
    <div class="form-group row">
        <label for="example-3" class="col-2 col-form-label">Category</label>
        <div class="col-10">
            <select class="form-control" type="sele" id="example-3" name="category_id">
                <option value="{{$post->category()->first()->id}}">{{$post->category()->first()->name}}</option>
                <option value="">--Without category--</option>
                @foreach($categories as $category)
                    @if($category->id == $post->category_id)
                        @continue
                    @endif
                    <option value="{{$category->id}}">{{$category->name}}</option>
                @endforeach
            </select>
        </div>
    </div>
    <div class="form-group row">
        <label for="example-3" class="col-2 col-form-label">File</label>
        <div class="col-10">
            <div class="row">
                <div class="col-3">
                    <div class="img-wrap" style="max-height: 300px; overflow: hidden">
                        <img class="card-img" src="/storage/images/posts/{{$post->file}}"
                             alt="Card image cap">
                    </div>
                </div>
                <div class="col-9">
                    <input class="form-control" type="file" id="example-3" name="file">
                </div>
            </div>
        </div>
    </div>
    <div class="form-group row">
        <label class="col text-center">
            <input class="btn btn-success" type="submit" value="Update">
        </label>
    </div>
</form>
@include('parts.end')