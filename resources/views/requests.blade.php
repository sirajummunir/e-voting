@extends('layouts.main')

@section('title', 'Manage Voters')

@section('contents')

<h4>Voters</h4>
<div class="divider"></div>
<div class="row">
	@if(count($users) > 0)
		<table class="bordered centered">
			<thead>
				<tr>
					<th>Image</th>
					<th>Name</th>
					<th>NID</th>
					<th>District</th>
					<th>Birthday</th>
					<th>Action</th>
				</tr>
			</thead>
			<tbody>
				@foreach($users as $user)
					<tr>
						<td>
							<img src="{{ $user->image }}" alt="{{ $user->name }}" width="70" style="border-radius: 50%">
						</td>
						<td>{{ $user->name }}</td>
						<td>{{ $user->nid }}</td>
						<td>{{ $user->permanent_district }}</td>
						<td>{{ $user->birthday->format('d M, Y') }}</td>
						<td>
							<a href="{{ route('profile', $user->nid) }}" class="btn-xs teal">Details</a>
							<a href="{{ route('request.judge', [$user->id, 'accept']) }}" class="btn-xs green">Accept</a>
							<a href="{{ route('request.judge', [$user->id, 'reject']) }}" class="btn-xs red">Reject</a>
						</td>
					</tr>
				@endforeach
			</tbody>
		</table>
		<div class="center">
			{!! $users->links() !!}
		</div>
	@else
		<p class="flow-text">There are no new requests.</p>
	@endif
</div>

@endsection
