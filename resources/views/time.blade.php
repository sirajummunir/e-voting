@extends('layouts.main')

@section('title', 'Manage Election Time')

@section('contents')
<h4>Manage Election Time</h4><br>
<form action="{{ route('time') }}" method="post">
	{{ csrf_field() }}
	<div class="input-field">
	    <input type="text" name="start_time" id="start_time" class="datepicker"
	    @if(cache('est'))
	    value="{{ cache('est')->format('d M, Y') }}"
	    @endif
	    >
	    <label for="start_time">Election Start Time</label>
	    @if ($errors->has('start_time'))
	        <span class="red-text">
	            <strong>{{ $errors->first('start_time') }}</strong>
	        </span>
	    @endif
	</div>

	<div class="input-field">
	    <input type="text" name="end_time" id="end_time" class="datepicker"
	    @if(cache('eet'))
	    value="{{ cache('eet')->format('d M, Y') }}"
		@endif
	    >
	    <label for="end_time">Election End Time</label>
	    @if ($errors->has('end_time'))
	        <span class="red-text">
	            <strong>{{ $errors->first('end_time') }}</strong>
	        </span>
	    @endif
	</div>

	<button class="teal hoverable btn waves-effect">Save</button>
</form>
<br><br>
@endsection

@section('scripts')

<script>
	$(document).ready(function(){
	    $('.datepicker').pickadate({
	        selectYears: 51,
	        selectMonths: true
	    });
	});
</script>

@endsection