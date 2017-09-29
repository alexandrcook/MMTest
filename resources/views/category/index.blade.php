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

    <li class="list-group-item list-group-item-success">
        <a href="/category/create">Create new</a>
    </li>
</ul>

<hr>


@include('parts.end')