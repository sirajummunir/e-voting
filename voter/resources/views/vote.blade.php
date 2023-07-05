@extends('layouts.main')

@section('title', 'Manage Voters')

@section('contents')

<div class="divider"></div>
<div class="row">
	@foreach($candidates as $type => $users)
		@if(count($users) > 0)
			<div class="divider"></div>
			<h4>{{ ucfirst($type) }}</h4>
			<table class="bordered centered">
				<thead>
					<tr>
						<th>Candidate Image</th>
						<th>Candidate Name</th>
						<th>Candidate Symbol</th>
						<th>Action</th>
					</tr>
				</thead>
				<tbody>
					@foreach($users as $user)
						<tr>
							<td>
								<img src="{{ $user->user->img }}" alt="{{ $user->name }}" width="70" style="border-radius: 50%">
							</td>
							<td>{{ $user->user->name }}</td>
							<td>
								<img src="{{ $user->mark_image }}" alt="{{ $user->name }}" width="70" style="border-radius: 50%">
							</td>
							<td>
								@if(Auth::user()->hasVoted($user->type))
									<button class="btn teal hoverable" disabled>Vote</button>
								@else
									<a href="{{ route('voteAction', $user->id) }}" class="btn-xs teal hoverable">Vote</a>
								@endif
							</td>
						</tr>
					@endforeach
				</tbody>
			</table>
		@endif
	@endforeach
</div>

@endsection
