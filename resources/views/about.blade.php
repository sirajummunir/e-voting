@extends('layouts.main')

@section('title', 'Developer Voting System')

@section('contents')

<div class="col m4 center container">
	<h4>About Project</h4>
	<p><b><i>
		The word "Vote" means to choose from a list, to elect or to determine. The main goal
		of voting is to come up with leaders of the peoples choice. 

	</i></b></p>
	<div class="divider"></div>
</div>

<div class="row center">
	<h5>Project Members</h5>
	<div class="col s12 m4">
		<div class="card">
			<div class="card-image">
				<img src="{{ asset('images/m1.jpg') }}" alt="Md. Shipon Miah">
				
			</div>
			<div class="card-content">
				Ms. Moriom Afroz <br>
				Intake: 27th <br>
				ID: 13143103053 <br>
				Department of CSE <br>
				
			</div>
		</div>
	</div>



	
	<div class="col s12 m4">
		<div class="card">
			<div class="card-image">
				<img src="{{ asset('images/m2.jpg') }}" alt="Shah Md. Sultan">
			</div>
			<div class="card-content">
				Ms. Saila Tasmim <br>
				Intake: 27th <br>
				ID: 13143103087 <br>
				Department of CSE <br>
			</div>
		</div>
	</div>
	<div class="col s12 m4">
		<div class="card">
			<div class="card-image">
				<img src="{{ asset('images/m3.jpg') }}" alt="Md. Shipon Miah">
			</div>
			<div class="card-content">
				Ms. Atiya Fairooz <br>
				Intake: 27th <br>
				ID: 13143103056 <br>
				Department of CSE <br>
			</div>
		</div>
	</div>
</div>
<div class="row center">
	<h5>Project Supervisor</h5>
	<div class="col s12 m4 offset-m4">
		<div class="card">
			<div class="card-image">
				<img src="{{ asset('images/sir.jpg') }}" alt="Sir">
				{{-- <span class="card-title">Md. Raisul Alam</span> --}}
			</div>
			<div class="card-content">
				Md. Raisul Alam <br>
				Assistant Professor <br>
				Department of CSE <br>
				BUBT<br>
			</div>
		</div>
	</div>
</div>

<div class="divider"></div>

@endsection