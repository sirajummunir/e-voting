@extends('layouts.main')

@section('title', 'Log In')

@section('contents')
<div class="container">
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
                <div class="col s12">
                    <button class="btn blue lighten-1 waves-effect waves-light">Reset</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
