@php($query = new \WP_Query(['post_type' => 'jobb', 'post_per_page' => -1]))

@if($query->have_posts())
		<div class="flexholder holder">
				@while($query->have_posts())
					@php($query->the_post())
					<a class="{{Jobbinnhold::hovedklasse(get_the_ID())}}" {!! Jobbinnhold::stiler(get_the_ID()) !!} href="#">
						<div class="boks__bilde">
							{!! get_the_post_thumbnail( null, 'logo' ) !!}
						</div>
						<p class="meta">
							<span class="meta__ting">{!! Jobbinnhold::soknadsfrist() !!}</span>
						</p>
						<h3>{{ get_field('overskrift') }}</h3>
						<p>{{ get_field('innledning') }}</p>
					</a>
				@endwhile
		</div>
	@php( wp_reset_postdata() )
@endif