@extends('layouts.main')

@section('title', 'Manage Candidates')

@section('contents')

<h4>Candidates</h4>
<div class="divider"></div>
<div class="row">
	<div class="col s12">
		<a class="teal btn right" onclick="addCandidate()"><i class="material-icons left"></i> Add Candidate</a>
	</div>
	<div class="divider col s12"></div>
	@if(count($candidates) > 0)
		<table class="bordered centered">
			<thead>
				<tr>
					<th>Candidate Image</th>
					<th>Name</th>
					<th>Symbol</th>
					<th>Income</th>
					<th>Candidate Type</th>
					<th>Location</th>
					<th>Action</th>
				</tr>
			</thead>
			<tbody>
				@foreach($candidates as $user)
					<tr>
						<td>
							<img src="{{ $user->user->image }}" alt="{{ $user->user->name }}" width="70" style="border-radius: 50%">
						</td>
						<td>{{ $user->user->name }}</td>
						<td>
							<img src="{{ $user->mark_image }}" alt="{{ $user->mark_name }}" width="70" style="border-radius: 50%">
						</td>
						<td>{{ $user->income }}</td>
						<td>{{ ucfirst($user->type) }}</td>
						<td>{{ ucfirst($user->place) }}</td>
						<td>
							<a href="{{ route('profile', $user->user->nid) }}" class="btn-xs teal">Details</a>
							<a class="btn-xs green" onclick="edit('{{ $user->id }}', '{{ $user->user->nid }}', '{{ $user->user->name }}', '{{ $user->mark_name }}', '{{ $user->income }}', '{{ $user->type }}', '{{ $user->place }}')"><i class="material-icons left tiny">edit</i> Edit</a>
							<a class="btn-xs red" href="{{ route('candidate.delete', $user->id) }}"><i class="material-icons left tiny">delete</i> Delete</a>
						</td>
					</tr>
				@endforeach
			</tbody>
		</table>
		<div class="center">
			{!! $candidates->links() !!}
		</div>
	@else
		<p class="flow-text">Theres No candidate yet.</p>
	@endif
</div>

<div class="modal" id="addModal" style="padding: 2em;">
	<div class="modal-content">
		<h5>Add New Candidate</h5>	
		<div class="divider"></div>
		<form method="post" action="{{ route('candidate.store') }}" enctype="multipart/form-data">
			{!! csrf_field() !!}
			<input type="hidden" name="edit" value="">
			<div class="input-field">
				<input type="text" id="search" name="nid" placeholder="Voter ID" required>
				<label>Search For a candidate</label>
			</div>
			<div class="input-field">
				<input type="text" name="name" placeholder="Candidate Name">
			</div>
			<div class="input-field">
				<input type="text" name="mark_name" placeholder="Symbol Name" required>
			</div>
			<div class="file-field input-field col m6">
			    <div class="btn">
			        <span>Symbol Image</span>
			        <input type="file" name="mark_img">
			    </div>
			    <div class="file-path-wrapper">
			        <input class="file-path validate" type="text">
			    </div>
			</div>
			<div class="input-field">
				<input type="number" name="income" placeholder="Annual Income(BDT)" required="">
			</div>
			<div class="input-field">
				<select name="type">
					<option value="chairman" selected>Chairman</option>
					<option value="member">Member</option>
					<option value="Mayor">Mayor</option>
				</select>
			</div>
			<div class="input-field">
				<input type="text" name="place" placeholder="Enter Upazilla">
			</div>
			<div class="col s12">
				<button class="teal hoverable btn addButton">Add Candidate</button>
			</div>
		</form>
	</div>
	
</div>

@endsection

@section('scripts')
	<script>
		$(document).ready(function() {
			$('.modal').modal();
		});
		$('input#search').on('keyup', function() {
			var id = $(this).val();
			if(id.length == 17){
				$.get("{{ route('candidate.search') }}", {
					id: id
				}).done(function(response) {
					if(response.status == 1){
						$('input[name=name]').val(response.name);
					}
				});
			}
		});
		$('select[name=type]').change(function() {
			var type = $(this).val();
			var location = '';
			if(type == 'chairman' || type == 'member'){
				location = 'Upazilla';
			}else{
				location = 'Division';
			}
			$('input[name=place]').prop('placeholder', 'Enter '+location);
		});
		function edit(id, nid, name, mark_name, income, type, place) {
			$('input[name=edit]').val(id);
			$('input[name=nid]').val(nid);
			$('input[name=name]').val(name);
			$('input[name=income]').val(income);
			$('input[name=mark_name]').val(mark_name);
			$('option[value=' + type +']').prop('selected', true);
			$('select').material_select();
			$('input[name=place]').val(place);
			$('.addButton').text('Update');
			$('#addModal').modal('open');
		}
		function addCandidate() {
			$('input[name=edit]').val('');
			$('input[name=nid]').val('');
			$('input[name=name]').val('');
			$('input[name=income]').val('');
			$('input[name=mark_name]').val('');
			$('option[value=\'chairman\']').prop('selected', true);
			$('select').material_select();
			$('input[name=place]').val('');
			$('.addButton').text('Add Candidate');
			$('#addModal').modal('open');
		}
	</script>
@endsection