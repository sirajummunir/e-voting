@extends('layouts.main')

@section('title', 'Log In')

@section('contents')
<div class="">
    <div class="row">
        <div class="card-panel col m10 row" style="margin: 50px; padding: 20px;">
            <h5>Reset Password</h5>
            <div class="divider"></div>
            <form class="col m10 offset-m1" method="post">

                {{ csrf_field() }}
                <div class="input-field">
                    <input name="email" id="email" type="email">
                    <label for="email">Email</label>

                    @if ($errors->has('email'))
                        <span class="red-text">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span>
                    @endif
                </div>

                <div class="input-field">
                    <input name="code" id="code" type="text">
                    <label for="code">Code</label>

                    @if ($errors->has('code'))
                        <span class="red-text">
                            <strong>{{ $errors->first('code') }}</strong>
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
                    <input name="password_confirmation" id="password_confirmation" type="password">
                    <label for="password_confirmation">Password Confirmation</label>
                </div>

                <div class="col s12">
                    <button class="btn blue lighten-1 waves-effect waves-light">Reset</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
