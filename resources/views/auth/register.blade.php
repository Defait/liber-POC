@extends('layout.default')

@section('content')
    <div class="row">
        <form class="col s12" role="form" method="POST" action="{{ route('register') }}">
        <div class="card blue-grey lighten-5">
        <div class="card-content">
        {{ csrf_field() }}
            <h1 class="">Register</h1>
            <div class="row">
                <div class="input-field col s12">
                    <input placeholder="Username" id="username" name="username" type="text" class="validate">
                    <label for="username" class="black-text">Username</label>
                </div>
            </div>
            <div class="row">
                <div class="input-field col s12">
                    <input placeholder="Email" id="email" name="email" type="email" class="validate">
                    <label for="email" class="black-text">Email</label>
                </div>
            </div>
            <div class="row">
                <div class="input-field col s12">
                    <input placeholder="Password" id="password" name="password" type="password" class="validate">
                    <label for="password" class="black-text">Password</label>
                </div>
            </div>
            <div class="row">
                <div class="input-field col s12">
                    <input placeholder="Confirm your password" id="password-confirm" name="password_confirmation" type="password" class="validate">
                    <label for="password-confirm" class="black-text">Confirm your password</label>
                </div>
            </div>      
            <button class="btn blue-grey darken-3 waves-effect waves-light" type="submit">Register
                <i class="material-icons right">send</i>
            </button>
        </div>
        </div>
        </form>
    </div>
@endsection