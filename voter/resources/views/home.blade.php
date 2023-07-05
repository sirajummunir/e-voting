@extends('layouts.main')

@section('title', 'Dashboard')

@section('contents')
<div class="container">
    <div class="row center">
        <div class="m8">
            <div class="card">
                <div class="card-content" style="padding: 30px">
                    <span class="card-title">Dashboard</span>
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
                    <div class="row">
                        <a class="btn-teal col s12" href="{{ route('home') }}">Home</a>
                        <a class="btn-teal col s12" href="{{ route('profile') }}">My Profile</a>
                        <a class="btn-teal col s12" href="{{ route('vote') }}">Voter Panel</a>
                        <a class="btn-teal col s12" href="{{ route('logout') }}">Logout</a>
                    </div>
                </div>                    
            </div>
        </div>
    </div>
</div>
@endsection
