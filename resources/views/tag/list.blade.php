@extends('layout')

@section('title' , 'Tag')

@section('content')

    @if(isset($_SESSION['message']) && $_SESSION['message']['type'] === 'success')
        <div class="alert alert-success" role="alert">
            {{  $_SESSION['message']['text'] }}
        </div>
    @endif

    <div class="conteiner">
        <table class="table table-bordered border-primary">
            <tr>
                <th>ID</th>
                <th>Title</th>
                <th>Slug</th>
                <th>Created at</th>
                <th>Updated at</th>
                <th>Actions</th>
            </tr>
            @forelse($tags as $tag)
                <tr>
                    <td>{{ $tag->id }}</td>
                    <td>{{ $tag->title }}</td>
                    <td>{{ $tag->slug }}</td>
                    <td>{{ $tag->created_at }} </td>
                    <td>{{ $tag->updated_at }} </td>
                    <td>
                        <a href="tag/{{ $tag->id }}/edit">
                            <img src="https://cdn3.iconfinder.com/data/icons/othericons-3-0/50/pencil-512.png" height="30" width="30">
                        </a>
                        <a href="tag/{{ $tag->id }}/delete">
                            <img src="https://image.flaticon.com/icons/png/512/61/61848.png" height="30" width="30">
                        </a>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="6" align="center">
                        No categories.
                    </td>
                </tr>
            @endforelse
            <tr>
                <td colspan="6" align="center">
                    <a href="tag/create">
                        <img src="https://png.pngtree.com/png-vector/20190214/ourmid/pngtree-vector-plus-icon-png-image_515260.jpg" height="30" width="30">
                    </a>
                </td>
            </tr>
        </table>
    </div>

    @if($tags->currentPage() > 1 )
        <a href="/tag/{{ $tags->previousPageUrl() }}"> Prev </a>
    @endif

    @foreach($tags->getUrlRange($tags->currentPage()-1 , $tags->currentPage()+1) as $num => $link)


        @if($loop->first && $num >= 2)
            <a href="/tag/{{ $tags->url(1) }}"> {{ 1 }} </a>
        @endif

        @if($num >= 3 && $loop->first)
            ...
        @endif


        @if($num > 0 && $num <= $tags->lastPage())
            <a href="/tag/{{ $link }}"> {{ $num }} </a>
        @endif


        @if($num == 2 && $loop->last)
            <a href="/tag/{{ $tags->url($tags->currentPage() + 2) }}"> {{ $tags->currentPage() + 2 }} </a>
        @endif

        @if($num+1 < $tags->lastPage() && $loop->last)
            ...
        @endif
        @if($loop->last && $num < $tags->lastPage())
            <a href="/tag/{{ $tags->url($tags->lastPage()) }}"> {{ $tags->lastPage()}} </a>
        @endif


    @endforeach


    @if($tags->currentPage() !== $tags->lastPage())
        <a href="/tag/{{ $tags->nextPageUrl() }}"> Next </a>
    @endif
    
    
    @unset($_SESSION['message'])
@endsection

