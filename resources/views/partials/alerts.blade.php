<div class="row" style="margin-top: 0px;">
	<div class="card flow-text" style="margin-top: 0px;">
		@if(Session::has('success'))
			<div class="card-content green white-text" style="padding:.3em 1em .3em 1em;">
				{{ Session::pull('success') }}
			</div>
		@endif

		@if(Session::has('warning'))
			<div class="card-content yellow white-text">
				{{ Session::pull('warning') }}
			</div>
		@endif

		@if(Session::has('danger'))
			<div class="card-content red white-text">
				{{ Session::pull('danger') }}
			</div>
		@endif
	</div>
</div>