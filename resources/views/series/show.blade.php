@extends('layout.default')

@section('content')

    <div class="col s12 m7">
        <div class="card horizontal">
            <div class="card-image">
                <img src="{{ asset($series->information->cover_img_location) }}">
            </div>
            <div class="card-stacked">
                <div class="card-content blue-grey lighten-5">
                    <h2>{{str_limit($series->name, 40)}}</h2>
                        @if($series->information->user_is_author == true)
                            <p><strong>Author:</strong> {{$series->information->getUserById($series->information->user_id)->username}}</p>
                        @else
                            <p><strong>Author:</strong> {{$series->information->author}}</p>
                        @endif
                    <p><strong>Books:</strong> {{$series->getBooks($series->id)->count()}}</p>
                    <p><strong>Chapters:</strong> {{$series->countChaptersForBooks($series->id)}}</p>
                    <h3><strong>Synopsis:</strong></h3>
                    <p>{{$series->information->synopsis}}</p>
                </div>
            </div>
        </div>
    </div>

    @if($series->getBooks($series->id))
        @foreach($series->getBooks($series->id)->sortBy('created_at')->chunk(4) as $chunks)        
            <div class="row">
                @foreach($chunks as $book)        
                    <div class="col s6 m3">
                        <div class="card">
                            <div class="card-image">
                                <img src="{{ asset($series->information->cover_img_location) }}">
                                <span class="card-title">{{$book->title}}</span>
                                <a class="btn-floating halfway-fab waves-effect waves-light red" href="/series/{{$series->slug}}/{{$book->slug}}"><i class="fa fa-eye" aria-hidden="true"></i></a>
                            </div>
                            <div class="card-content">
                                @if($book->information)
                                    <p>{{str_limit($book->information->synopsis, 100)}}</p>
                                @else
                                    <p>{{str_limit($book->series->information->synopsis, 100)}}</p>
                                @endif
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @endforeach
    @endif

@endsection