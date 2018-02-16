@extends('layout.default')

@section('content')

    @if($chapters)
        <div class="col s12">

            @foreach($chapters as $chapter)
                <div class="card">
                    <ul class="collection">
                        <li class="collection-item avatar">
                            <img src="{{ asset($chapter->getSeriesObjectThroughBook($chapter->book_id)->information->cover_img_location) }}" alt="" class="circle responsive-img">
                            <a href="/series/{{$chapter->getSeriesObjectThroughBook($chapter->book_id)->slug}}/{{$chapter->getBookObject($chapter->book_id)->slug}}/{{$chapter->chapter_number}}"><span class="title black-text">{{$chapter->getSeriesObjectThroughBook($chapter->book_id)->name}} -  Book: {{$chapter->getBookObject($chapter->book_id)->title}}  - <strong>Chapter: {{$chapter->chapter_number}}</strong></span></a>
                            <p>{{str_limit($chapter->body, 500) }}</p>
                            <a href="#!" class="secondary-content"><i class="material-icons">grade</i></a>
                        </li>
                    </ul>
                </div>
            @endforeach
        </div>
    @endif

@endsection