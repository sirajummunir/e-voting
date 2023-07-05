<!DOCTYPE html>
<html>

@include('partials.head')

<body>
	
	@include('partials.nav')
	@include('partials.alerts')
	
	<div class="container">
		
		@yield('contents')

	</div>

	@include('partials.footer')
	
    @include('partials.footerjs')
    
    @yield('scripts')
</body>
</html>