	<!--Import jQuery before materialize.js-->
	<script type="text/javascript" src="{{ asset('document/jquery/dist/jquery.min.js') }}"></script>
	<script type="text/javascript" src="{{ asset('document/materialize/dist/js/materialize.min.js') }}"></script>
	<script src="/document/chartjs/Chart.bundle.min.js"></script>
	<script type="text/javascript" src="{{ asset('js/main.js') }}"></script>
	<script>
		$( document ).ready(function(){
			$(".button-collapse").sideNav();
		});
	</script>
	@yield('scripts')