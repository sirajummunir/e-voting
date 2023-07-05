@extends('layouts.main')

@section('title', 'Register a new Account')

@section('contents')
<div class="container">
    <div class="row">
        <div class="card-panel col m12 row hoverable" style="margin-top: 50px; padding: 20px;">
            <h5>New Account</h5>
            <div class="divider"></div>
            <form method="post" action="{{ route('register') }}">
                
                {{ csrf_field() }}

                <div class="input-field">
                    <input name="name" id="name" type="text" value="{{ old('name') }}">
                    <label for="name">Name</label>

                    @if ($errors->has('name'))
                        <span class="red-text">
                            <strong>{{ $errors->first('name') }}</strong>
                        </span>
                    @endif
                </div>

                <div class="input-field">
                    <input name="email" id="email" type="email" value="{{ old('email') }}">
                    <label for="email">Email</label>

                    @if ($errors->has('email'))
                        <span class="red-text">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span>
                    @endif
                </div>

                <div class="input-field">
                    <input name="password" id="password" type="password">
                    <label for="password">Password</label>

                    @if ($errors->has('password'))
                        <span class="red-text">
                            <strong>{{ $errors->first('password') }}</strong>
                        </span>
                    @endif
                </div>

                <div class="input-field">
                    <input name="password_confirmation" id="cpassword" type="password">
                    <label for="cpassword">Confirm Password</label>
                </div>

                <button class="btn blue lighten-1 waves-effect waves-light">Register</button>

            </form>
        </div>
    </div>
</div>
@endsection
