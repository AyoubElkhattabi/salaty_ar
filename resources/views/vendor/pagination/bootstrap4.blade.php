@if($paginator->hasPages())

<nav aria-label="Page navigation example text-center">
    <ul class="pagination justify-content-center">
      <li class="page-item">

        {{-- Start Previous--}}

        @if($paginator->onFirstPage())

        @else
      <a class="page-link" href="{{$paginator->previousPageUrl()}}" aria-label="Previous">
                <span aria-hidden="true">&laquo;</span>
                <span class="sr-only">Previous</span>
            </a>
        @endif

        {{-- end Previous--}}

            @foreach($elements as $element)
                @if(is_array($element))
                    @foreach ($element as $page=>$url)

                        @if($page == $paginator->currentPage())
                        <li class="page-item active"><a class="page-link" href="{{$url}}">{{$page}}</a></li>
                        @else
                        <li class="page-item"><a class="page-link" href="{{$url}}">{{$page}}</a></li>
                        @endif

                    @endforeach
                @endif
            @endforeach






        {{--Start Next--}}

        @if($paginator->hasMorePages())
        <a class="page-link" href="{{$paginator->nextPageUrl()}}" aria-label="Next">
          <span aria-hidden="true">&raquo;</span>
          <span class="sr-only">Next</span>
        </a>
        @endif


        {{-- End Next --}}


      </li>
    </ul>
  </nav>


  @endif
