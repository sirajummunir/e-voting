@extends('layouts.main')

@section('title', 'Manage Voters')

@section('container')

<div class="row" style="padding: 20px">
	<div class="col m9">
		<h4>Voters</h4>
	</div>
	<div class="col m9 s12">
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
				<p class="flow-text">There are no voters.</p>
			@endif
		</div>
	</div>
	<div class="col m3 s12">
		<div class="card">
			<div class="card-content">
				<canvas id="gender"></canvas>
			</div>
		</div>
	</div>
</div>
@endsection


@section('scripts')

<script>
	
	var ctx = $('#gender');
		var myChart = new Chart(ctx, {
		    type: 'pie',
		    data: {
		        labels: ["Male", "Female"],
		        datasets: [{
		            data: [{{ $maleCount }}, {{ $femaleCount }}],
		            backgroundColor: [
		            	"rgb(54, 162, 235)",
		                "rgb(255, 99, 132)"
		            ]
		        }]
		    }
		});

</script>

@endsection