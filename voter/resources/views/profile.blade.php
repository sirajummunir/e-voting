@extends('layouts.main')

@section('title', 'Dashboard')

@section('contents')
    <div class="card">
        <div class="card-contents row">
            {{-- <div class="card-title">My Profile</div> --}}
            <div class="col m3" style="border-right: 1px solid black;">
                <div class="profile-img center">
                    <img class="hoverable" src="{{ asset('/images/male.jpg') }}" alt="{{ $user->name }}">
                    <h5>{{ $user->name }}</h5>
                </div>
            </div>
            <div class="col m8" style="font-size: 1.2em;">
                <h4>Personal Info</h4>
                <table class="striped centered">
                    <tr><th>Name</th><td>{{ $user->name }}</td></tr>
                    <tr><th>NID</th><td>{{ $user->nid }}</td></tr>
                    <tr><th>Email</th><td>{{ $user->email }}</td></tr>
                    <tr><th>Mobile</th><td>{{ $user->mobile }}</td></tr>
                    <tr><th>Birthday</th><td>{{ $user->birthday->format('d F, Y') }}</td></tr>
                    <tr><th>Religion</th><td>{{ $user->religion }}</td></tr>
                    <tr><th>Marrital</th><td>{{ $user->marital }}</td></tr>
                </table>
                <h4>Present Address</h4>
                <table class="striped centered">
                    <tr><th>Division</th><td>{{ $user->present_division }}</td></tr>
                    <tr><th>District</th><td>{{ $user->present_district }}</td></tr>
                    <tr><th>Upazilla</th><td>{{ $user->present_upazilla }}</td></tr>
                    <tr><th>Village</th><td>{{ $user->present_village }}</td></tr>
                    <tr><th>Post</th><td>{{ $user->present_po }}({{ $user->present_pc }})</td></tr>
                </table>
                <h4>Permanent Address</h4>
                <table class="striped centered">
                    <tr><th>Division</th><td>{{ $user->permanent_division }}</td></tr>
                    <tr><th>District</th><td>{{ $user->permanent_district }}</td></tr>
                    <tr><th>Upazilla</th><td>{{ $user->permanent_upazilla }}</td></tr>
                    <tr><th>Village</th><td>{{ $user->permanent_village }}</td></tr>
                    <tr><th>Post</th><td>{{ $user->permanent_po }}({{ $user->permanent_pc }})</td></tr>
                </table>
            </div>
        </div>
    </div>
@endsection
