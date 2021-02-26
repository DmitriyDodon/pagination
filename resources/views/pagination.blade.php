@php
    /** @var  $categories *//** @var  $posts *//** @var  $tags */
    $pages = [];
    $pages['value'] = $categories ?? $pages['value'] = $posts ?? $pages['value'] = $tags ;

    if ($pages['value'] === $categories){
        $pages['name'] = 'category';
    }elseif ($pages['value'] === $posts){
        $pages['name'] = 'post';
    }else{
        $pages['name']= 'tag';
    }
@endphp


@section('pages')
        @if($pages['value']->currentPage() > 1 )
            <a href="/{{ $pages['name'] }}/{{ $pages['value']->previousPageUrl() }}"> Prev </a>
        @endif

        @foreach($pages['value']->getUrlRange($pages['value']->currentPage()-1 , $pages['value']->currentPage()+1) as $num => $link)


            @if($loop->first && $num >= 2)
                <a href="/{{ $pages['name'] }}/{{ $pages['value']->url(1) }}"> {{ 1 }} </a>
            @endif

            @if($num >= 3 && $loop->first)
                ...
            @endif


            @if($num > 0 && $num <= $pages['value']->lastPage())
                <a href="/{{ $pages['name'] }}/{{ $link }}"> {{ $num }} </a>
            @endif


            @if($num == 2 && $loop->last)
                <a href="/{{ $pages['name'] }}/{{ $pages['value']->url($pages['value']->currentPage() + 2) }}"> {{ $pages['value']->currentPage() + 2 }} </a>
            @endif

            @if($num+1 < $pages['value']->lastPage() && $loop->last)
                ...
            @endif
            @if($loop->last && $num < $pages['value']->lastPage())
                <a href="/{{ $pages['name'] }}/{{ $pages['value']->url($pages['value']->lastPage()) }}"> {{ $pages['value']->lastPage()}} </a>
            @endif

        @endforeach


        @if($pages['value']->currentPage() !== $pages['value']->lastPage())
            <a href="/{{ $pages['name'] }}/{{ $pages['value']->nextPageUrl() }}"> Next </a>
        @endif

@endsection