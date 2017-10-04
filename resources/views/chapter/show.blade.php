@extends('layout.default')

@section('content')

    <div class="row">
        <div class="col s12 m12">
            <div class="card blue-grey lighten-5">
                <div class="card-content">
                    <span class="card-title">Chapter: {{$chapter->chapter_number}} - Title: {{$chapter->title}}</span>
                    <p>{{$chapter->body}}</p>
                </div>
                <div class="card-action">
                    @if($chapter->getPreviousChapter($chapter))
                        <a class="left-align black-text" href="/s/{{$chapter->getSeriesObjectThroughBook($chapter->book_id)->slug}}/{{$chapter->getBookObject($chapter->book_id)->slug}}/{{$chapter->getPreviousChapter($chapter)['chapter_number']}}">Chapter {{$chapter->getPreviousChapter($chapter)['chapter_number']}}</a>
                    @else
                        <a class="left-align black-text" href="/s/{{$chapter->getSeriesObjectThroughBook($chapter->book_id)->slug}}/{{$chapter->getBookObject($chapter->book_id)->slug}}/">Go back</a>
                    @endif
                    @if($chapter->getNextChapter($chapter))
                        <a class="right right-align black-text" href="/s/{{$chapter->getSeriesObjectThroughBook($chapter->book_id)->slug}}/{{$chapter->getBookObject($chapter->book_id)->slug}}/{{$chapter->getNextChapter($chapter)['chapter_number']}}">Chapter {{$chapter->getNextChapter($chapter)['chapter_number']}}</a>
                    @else
                        <a class="right right-align black-text" href="/s/{{$chapter->getSeriesObjectThroughBook($chapter->book_id)->slug}}/{{$chapter->getBookObject($chapter->book_id)->slug}}/">Go back</a>
                    @endif
                </div>
            </div>
        </div>
    </div>

@endsection