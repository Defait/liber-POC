@extends('layout.default')

@section('content')

    @foreach($series->sortBy('name')->chunk(4) as $chunks)        
        <div class="row">
            @foreach($chunks as $serie)        
                <div class="col s12 m6">
                    <div class="card">
                        <a href="series/{{$serie->slug}}">
                            <div class="card-image">
                                <img src="{{ asset($serie->information->cover_img_location) }}">
                                <span class="card-title z-depth-3">{{$serie->name}}</span>
                                <a class="btn-floating halfway-fab waves-effect waves-light red" href="series/{{$serie->slug}}"><i class="fa fa-eye" aria-hidden="true"></i></a>
                            </div>
                        </a>
                        <div class="card-content">
                            <p>{!! str_limit(nl2br(e($serie->information->synopsis))) !!}</p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @endforeach
@endsection