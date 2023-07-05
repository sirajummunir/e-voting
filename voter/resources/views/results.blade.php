@extends('layouts.main')

@section('title', 'Manage Candidates')

@section('contents')

<div class="row">
	@foreach($board as $type => $candidates)
		@if(count($candidates) > 0)
			<h4>{{ ucfirst($type) }}</h4>
			<table class="bordered centered">
				<thead>
					<tr>
						<th>Candidate Image</th>
						<th>Name</th>
						<th>Sympol</th>
						<th>Income</th>
						<th>Candidate Type</th>
						<th>Location</th>
						<th>Total Votes</th>
						<th>Action</th>
					</tr>
				</thead>
				<tbody>
					@foreach($candidates as $user)
						<tr>
							<td>
								<img src="{{ $user->user->img }}" alt="{{ $user->user->name }}" width="70" style="border-radius: 50%">
							</td>
							<td>{{ $user->user->name }}</td>
							<td>
								<img src="{{ $user->mark_image }}" alt="{{ $user->mark_name }}" width="70" style="border-radius: 50%">
							</td>
							<td>{{ $user->income }}</td>
							<td>{{ ucfirst($user->type) }}</td>
							<td>{{ ucfirst($user->place) }}</td>
							<td>{{ $user->total }}</td>
							<td>
								<a href="{{ route('profile', $user->user->nid) }}" class="btn-xs teal">Details</a>
							</td>
						</tr>
					@endforeach
				</tbody>
			</table>

		@else
			<p class="flow-text">There's no candidate as {{ ucfirst($type) }}</p>
		@endif
	@endforeach
</div>

@endsection