@extends('layouts.main')

@section('title', 'Confirm Email')

@section('contents')
<div class="container">
    <div class="row">
        <div class="card-panel col m10 row" style="margin: 50px; padding: 20px;">
            <h5>Confirm Email</h5>
            <div class="divider"></div>
            <form class="col m10 offset-m1" method="post" action="{{ route('regCode') }}">

                {{ csrf_field() }}
                <div class="input-field">
                    <input name="email" id="email" type="email">
                    <label for="email">Email</label>
                </div>

                <div class="input-field">
                    <input name="code" id="code" type="text">
                    <label for="code">Code</label>
                </div>

                <div class="col s12">
                    <button class="btn blue lighten-1 waves-effect waves-light">Confirm Email</button>
                    &nbsp;Or You can <a href="{{ route('register') }}"><u>Register</u></a>
                </div>

            </form>
        </div>
    </div>
</div>
@endsection
