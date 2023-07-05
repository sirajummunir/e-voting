	<!--Import jQuery before materialize.js-->
	<script type="text/javascript" src="{{ asset('vendor/jquery/dist/jquery.min.js') }}"></script>
	<script type="text/javascript" src="{{ asset('vendor/materialize/dist/js/materialize.min.js') }}"></script>
	<script type="text/javascript" src="{{ asset('js/main.js') }}"></script>
	<script>
		$( document ).ready(function(){
			$(".button-collapse").sideNav();
		});
	</script>
	@yield('scripts')