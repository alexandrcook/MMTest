@include('parts.head')

<h2 class="my-4">Post create</h2>

<form action="{{route('post')}}" method="post" enctype="multipart/form-data">
    {{ csrf_field() }}
    <div class="form-group row">
        <label for="example-1" class="col-2 col-form-label">Name</label>
        <div class="col-10">
            <input class="form-control" type="text" id="example-1" name="name">
        </div>
    </div>
    <div class="form-group row">
        <label for="example-2" class="col-2 col-form-label">Content</label>
        <div class="col-10">
            <textarea style="height: 200px" class="form-control" type="text" id="example-2" name="content"></textarea>
        </div>
    </div>
    <div class="form-group row">
        <label for="example-3" class="col-2 col-form-label">File</label>
        <div class="col-10">
            <input class="form-control" type="file" id="example-3" name="file">
        </div>
    </div>
    <div class="form-group row">
        <label for="example-3" class="col-2 col-form-label">Category</label>
        <div class="col-10">
            <select class="form-control" type="sele" id="example-3" name="category_id">
                <option value="">Select you category</option>
                @foreach($categories as $category)
                <option value="{{$category->id}}">{{$category->name}}</option>
                @endforeach
            </select>
        </div>
    </div>
    <div class="form-group row">
        <label class="col text-center">
            <input class="btn btn-success" type="submit" value="Create">
        </label>
    </div>
</form>
@include('parts.end')