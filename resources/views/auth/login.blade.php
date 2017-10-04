@extends('layout.default')

@section('content')
    <div class="row">
        <form class="col s12" role="form" method="POST" action="{{ route('login') }}">
            <div class="card blue-grey lighten-5">
                <div class="card-content">
                {{ csrf_field() }}
                    <h1 class="">Login</h1>
                    <div class="row">
                        <div class="input-field col s12">
                            <input placeholder="Email" id="email" name="email" type="text" class="validate">
                            <label for="email" class="black-text">Email</label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col s12">
                            <input placeholder="Password" id="password" name="password" type="password" class="validate">
                            <label for="password" class="black-text">Password</label>
                        </div>
                    </div>      
                    <button class="btn blue-grey darken-3 waves-effect waves-light" type="submit" name="action">Submit
                        <i class="material-icons right">send</i>
                    </button>
                </div>
            </div>
        </form>
    </div>
@endsection