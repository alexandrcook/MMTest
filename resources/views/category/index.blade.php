@include('parts.head')

<h2 class="my-4">Category list</h2>

<ul class="list-group">

    @foreach($categories as $category)
        <li class="list-group-item">
            <a href="{{route('category.show', ['id' => $category->id])}}">
                {{$category->name}}
            </a>
        </li>
    @endforeach
</ul>

<div class="card-body" style="text-align: center">
    <a class="btn btn-success" href="{{route('category.create')}}">Create new</a>
</div>


@include('parts.end')