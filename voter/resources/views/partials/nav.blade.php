	<nav>
		<div class="nav-wrapper teal lighten-1">
			<a href="/" class="brand-logo">&nbsp;&nbsp;Vote<!-- <img src="brand.png"> --></a>
			<a href="#" data-activates="mobile-nav" class="button-collapse"><i class="material-icons">menu</i></a>
			<ul class="right hide-on-med-and-down">
				@role('admin')
					<li><a href="{{ route('voters') }}">Voters</a></li>
					<li><a href="{{ route('candidates') }}">Candidates</a></li>
					<li><a href="{{ route('results') }}">Results</a></li>
				@endrole
				@role('voter')
					<li><a href="">Vote</a></li>
				@endrole
				@role('candidate')
					<li><a href="">Room</a></li>
				@endrole
				@if(Auth::check())
					<li><a href="{{ route('logout') }}"><i class="material-icons left">call_made</i> Logout</a></li>
				@else
					<li><a href="{{ route('login') }}"><i class="material-icons left">input</i> Login</a></li>
					<li><a href="{{ route('register') }}"><i class="material-icons left">person_add</i>Register</a></li>
				@endif
			</ul>
			<ul class="side-nav" id="mobile-nav">
				@if(Auth::check())
					<li><a href="{{ route('logout') }}"><i class="material-icons left">call_made</i> Logout</a></li>
				@else
					<li><a href="{{ route('login') }}"><i class="material-icons left">input</i> Login</a></li>
				@endif
			</ul>
		</div>
	</nav>