@extends('layout.default')

@section('content')

    @foreach($chapters->chunk(4) as $chunks)        
        <div class="row">
            @foreach($chunks as $chapter)        
                <div class="col s12 m6">
                    <div class="card">
                        <div class="card-image">
                            <img src="img/wukong.jpg">
                            <span class="card-title">{{$chapter->title}}</span>
                            <a class="btn-floating halfway-fab waves-effect waves-light red" href="s/{{$chapter->getSeriesObjectThroughBook($chapter->book_id)->slug}}/{{$chapter->getBookObject($chapter->book_id)->slug}}/{{$chapter->chapter_number}}"><i class="fa fa-eye" aria-hidden="true"></i></a>
                        </div>
                        <div class="card-content">
                            <p>{{str_limit($chapter->body, 100)}}</p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        @endforeach

@endsection