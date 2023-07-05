@extends('layouts.main')

@section('title', 'Manage Voters')

@section('contents')

<h4>Voters</h4>
<div class="divider"></div>
<div class="row">
	<p><b>{{ count($users) }}</b> users matches your given <b>{{ request('nid')[0] >= '0' &&  request('nid')[0] <= '9' ? 'NID Pattern' : 'District'}}</b></p>
	@if(count($users) > 0)
		<table class="bordered centered">
			<thead>
				<tr>
					<th>Image</th>
					<th>Name</th>
					<th>Gender</th>
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
						<td>{{ $user->gender }}</td>
						<td>{{ $user->nid }}</td>
						<td>{{ $user->permanent_district }}</td>
						<td>{{ $user->birthday->format('d M, Y') }}</td>
						<td>
							<a href="{{ route('profile', $user->nid) }}" class="btn-xs teal">Details</a>
							<a class="btn-xs red" href="{{ route('deleteUser', $user->id) }}"><i class="material-icons left tiny">delete</i> Delete</a>
						</td>
					</tr>
				@endforeach
			</tbody>
		</table>
		<div class="center">
			{!! $users->links() !!}
		</div>
	@else
		<p class="flow-text">No user matches your given {{ request('nid')[0] >= '0' &&  request('nid')[0] <= '9' ? 'NID' : 'District'}}</p>
	@endif
</div>

@endsection
