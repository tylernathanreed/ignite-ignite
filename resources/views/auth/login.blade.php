@extends('layouts.auth')

@section('content')

    <form action="{{ route('auth.login.submit') }}" method="POST">
        {{ csrf_field() }}

        <div class="form-group has-feedback{{ has_error('username') }}">
            <label for="username">Username</label>
            <input type="text" class="form-control" placeholder="Username" name="username"/>
            <span class="fa fa-user form-control-feedback"></span>
            @error('username')
        </div>

        <div class="form-group has-feedback{{ has_error('password') }}">
            <label for="username">Password</label>
            <input type="password" class="form-control" placeholder="Password" name="password"/>
            <span class="fa fa-lock form-control-feedback"></span>
            @error('password')
        </div>

        <hr>

        <div class="form-group">
            <button type="submit" class="btn btn-primary form-control">
                <i class="fa fa-btn fa-sign-in"></i> Login
            </button>
        </div>
    </form>

@endsection
