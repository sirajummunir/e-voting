	 	<nav>
		<div class="nav-wrapper teal lighten-1">
			<a href="/" class="brand-logo">&nbsp;&nbsp;Online Voting System<!-- <img src="brand.png"> --></a>
			<a href="#" data-activates="mobile-nav" class="button-collapse"><i class="material-icons">menu</i></a>
			<ul class="right hide-on-med-and-down">
				@if(Route::currentRouteName() != 'home')
					<li><a href="{{ route('home') }}">Home</a></li>
				@endif
				
                     
					<li>
						<a class="dropdown-button" href="#" data-beloworigin="true" data-activates="admin">
							Controls<i class="material-icons right"></i>
						</a>
					</li>
					<ul id="admin" class="dropdown-content">
						<li><a href="{{ route('requests') }}">Requests</a></li>
						<li><a href="{{ route('voters') }}">Voters</a></li>
						<li><a href="{{ route('candidates') }}">Candidates</a></li>
						<li><a href="{{ route('time') }}">Time</a></li>
					</ul>
					<li><a href="#search" class="modal-trigger"><i class="material-icons">search</i></a></li>
					<li><a href="{{ route('results') }}">Results</a></li>
					<div id="search" class="modal black-text">
						<div style="padding: 15px;">
							<h5 class="">Search by NID or District</h5>
							<form action="{{ route('search') }}">
								<div class="input-field">
								    <input name="nid" id="search" type="text" placeholder="NID number or district. Ex: 1234 or dhaka">
								    <label for="search">Search</label>
								</div>
								<button class="hoverable btn waves-effect">Search</button>
							</form>
						</div>
					</div>
				<!-- @endrole -->
				<!-- @role('voter') -->
					<!-- <li><a href="">Vote</a></li> -->
				<!-- @endrole -->
				<!-- @role('candidate') -->
					<!-- <li><a href="">Room</a></li> -->
			
				<!-- @endrole -->
				@if(Auth::check())
					<li><a href="{{ route('logout') }}"><i class="material-icons left"></i> Logout</a></li>
				@else
					<li><a href="{{ route('login') }}"><i class="material-icons left"></i> Login</a></li>
					<li><a href="{{ route('register') }}"><i class="material-icons left"></i>Register</a></li>
				@endif
				<li><a href="{{ route('about') }}">About Us</a></li>
			</ul>
			<ul class="side-nav" id="mobile-nav">
				@if(Auth::check())
					<li><a href="{{ route('logout') }}"><i class="material-icons left"></i> Logout</a></li>
				@else
					<li><a href="{{ route('login') }}"><i class="material-icons left"></i> Login</a></li>
				@endif
				<li><a href="{{ route('about') }}">About Us</a></li>
			</ul>
		</div>
	</nav>