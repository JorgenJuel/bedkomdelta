<div class="sidetopp">
	@if(is_front_page())
		
		{!! get_field('header') !!}
	
	@elseif(get_field('overskrift'))
		
		<h1>{{ get_field('overskrift') }}</h1>	
		@if(get_field('underoverskrift'))
			<p>{{ get_field('underoverskrift')}}</p>
		@endif

	@else
	
	  <h1>{!! App::title() !!}</h1>
	@endif
</div>