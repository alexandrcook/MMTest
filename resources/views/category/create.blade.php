@include('parts.head')

<h2 class="my-4">Category create</h2>

<form action="{{route('category')}}" method="post">

    {{ csrf_field() }}

    <div class="form-group row">
        <label for="example-1" class="col-2 col-form-label">Name</label>
        <div class="col-10">
            <input class="form-control" type="text" id="example-1" name="name">
        </div>
    </div>
    <div class="form-group row">
        <label for="example-2" class="col-2 col-form-label">Description</label>
        <div class="col-10">
            <input class="form-control" type="text" id="example-2" name="description">
        </div>
    </div>
    <div class="form-group row">
        <label class="col text-center">
            <input class="btn btn-success" type="submit" value="Create">
        </label>
    </div>
</form>
@include('parts.end')