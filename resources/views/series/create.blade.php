@extends('layout.default')

@section('content')

<div class="row">
    <form class="col s12" role="form" method="POST" action="{{ route('series.store') }}">
    <div class="card blue-grey lighten-5">
    <div class="card-content">
    {{ csrf_field() }}
        <h1>Create your story</h1>
        <div class="row">
            <div class="input-field col s6">
                <input placeholder="Name" id="name" name="name" type="text" class="validate">
                <label for="name">Name</label>
            </div>
        </div>
        <div class="row">
            <div class="input-field col s12">
                <textarea id="synopsis" name="synopsis" class="materialize-textarea"></textarea>
                <label for="description">Synopsis</label>
            </div>
        </div>
        <button class="btn blue-grey darken-3 waves-effect waves-light" type="submit" name="action">Submit
            <i class="material-icons right">send</i>
        </button>
    </div>
    </div>
    </form>
</div>

<script>
    $(document).ready(function() {
        $('#description').trigger('autoresize');
    });
</script>
@endsection