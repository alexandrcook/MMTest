@include('parts.head')

<h3 class="card-title">Category edit</h3>

<form action="{{route('category.upd', ['id' => $category->id])}}" method="post">

    {{ csrf_field() }}
    <input type="hidden" name="_method" value="PUT">

    <div class="form-group row">
        <label for="example-1" class="col-2 col-form-label">Name</label>
        <div class="col-10">
            <input class="form-control" type="text" id="example-1" name="name" value="{{$category->name}}" placeholder="{{$category->name}}">
        </div>
    </div>
    <div class="form-group row">
        <label for="example-2" class="col-2 col-form-label">Description</label>
        <div class="col-10">
            <input class="form-control" type="text" id="example-2" name="description" value="{{$category->description}}" placeholder="{{$category->description}}">
        </div>
    </div>
    <div class="form-group row">
        <label class="col text-center">
            <input class="btn btn-success" type="submit" value="Update">
        </label>
    </div>
</form>
@include('parts.end')