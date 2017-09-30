{{dump($posts->lastPage())}}

<ul class="pagination justify-content-center mb-4">

    @if($posts->currentPage() != 1)
        <li class="page-item">
            <a class="page-link" href="{{$posts->previousPageUrl()}}"><</a>
        </li>
    @endif

    @for( $i = 1; $i<=$posts->lastPage(); $i++)
        <li class="page-item @if($i == $posts->currentPage()) active @endif"><a class="page-link"
                                                                                href="/?page={{$i}}">{{$i}}</a>
        </li>
    @endfor

    @if($posts->currentPage() != $posts->lastPage())
        <li class="page-item">
            <a class="page-link" href="{{$posts->nextPageUrl()}}">></a>
        </li>
    @endif
</ul>