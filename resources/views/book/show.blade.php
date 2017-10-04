@extends('layout.default')

@section('content')
    @if($book->information)
        <div class="col s12 m7">
            <div class="card horizontal">
                <div class="card-image">
                    <img src="{{ asset($book->information->cover_img_location) }}">
                </div>
                <div class="card-stacked">
                    <div class="card-content blue-grey lighten-5">
                        <h2>{{str_limit($book->title, 40)}}</h2>
                        @if($book->information->user_is_author)
                            <p><strong>Author:</strong> {{$book->information->getUserById($book->information->user_id)->username}}</p>
                        @else
                            <p><strong>Author:</strong> {{$book->information->author}}</p>
                        @endif                    
                        <p><strong>Chapters:</strong> {{$book->getChaptersForBook($book->id)->count()}}</p>
                        <h3><strong>Synopsis:</strong></h3>
                        <p>{{$book->information->synopsis}}</p>
                    </div>
                </div>
            </div>
        </div>
    @else
        <div class="col s12 m7">
            <div class="card horizontal">
                <div class="card-image">
                    <img src="{{ asset($book->series->information->cover_img_location) }}">
                </div>
                <div class="card-stacked">
                    <div class="card-content blue-grey lighten-5">
                        <h2>{{str_limit($book->title, 40)}}</h2>
                        @if($book->series->information->user_is_author)
                            <p><strong>Author:</strong> {{$book->series->information->getUserById($book->series->information->user_id)->username}}</p>
                        @else
                            <p><strong>Author:</strong> {{$book->series->information->author}}</p>
                        @endif  
                        <p><strong>Chapters:</strong> {{$book->getChaptersForBook($book->id)->count()}}</p>
                        <h3><strong>Synopsis:</strong></h3>
                        <p>{{$book->series->information->synopsis}}</p>
                    </div>
                </div>
            </div>
        </div>
    @endif

    @foreach($book->chapters->sortBy('chapter_number') as $chapter)
        <ul class="collection">
            <li class="collection-item avatar">
            <img src="{{ asset('img/wukong.jpg') }}" alt="" class="circle responsive-img">
            <a href="/s/{{$chapter->getSeriesObjectThroughBook($chapter->book_id)->slug}}/{{$chapter->getBookObject($chapter->book_id)->slug}}/{{$chapter->chapter_number}}"><span class="title"><strong>Chapter: {{$chapter->chapter_number}} - {{$chapter->title}}</strong></span></a>
            <p>{{str_limit($chapter->body, 500) }}</p>
            <a href="#!" class="secondary-content"><i class="material-icons">grade</i></a>
            </li>
        </ul>
    @endforeach


@endsection