

@if ($paginator->hasPages())


<div class="Pagination container d-flex align-items-center justify-content-between text-left" style="direction:rtl;">


    {{-- Start Previous Page Link --}}
    @if($paginator->onFirstPage())
        <div class="Pagination-item"></div>
    @else
        <div class="Pagination-item"><a href="{{ $paginator->previousPageUrl() }}">السابق</a></div>
    @endif
    {{-- End Previous Page Link --}}



    <ul class="p-0 m-0 ">
        @foreach ($elements as $element)
            @if (is_array($element))
                @foreach ($element as $page =>$url)
                    @if ($page == $paginator->currentPage())
                        <li class="Pagination-item activeitem">{{ $page }}</li>
                    @else
                        <li class="Pagination-item"><a href="{{ $url }}">{{ $page }}</a></li>
                    @endif
                @endforeach
            @endif
        @endforeach
    </ul>



    {{-- Start Has more Page Link --}}
    @if($paginator->hasMorePages())
        <div class="Pagination-item"><a href="{{$paginator->nextPageUrl()}}">التالي</a></div>
    @else
        <div class="Pagination-item"> </div>
    @endif
    {{-- End Has more Page Link --}}
</div>
@endif
