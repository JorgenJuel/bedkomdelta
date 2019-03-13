{{--
  Template Name: Linjeforskjell
--}}

@extends('layouts.app')

@section('content')
  @while(have_posts()) @php the_post() @endphp
    <div class="hovedinnhold">
	  <div class="container">
	    <article class="tekstinnhold">
	      <h1>{{ get_the_title() }}</h1>
	      @php the_content() @endphp

	      <div class="trippel">
	      	@while(have_rows('linjer')) @php the_row() @endphp
	      		<div class="trippel__boks">
	      			<article class="linjeforklaring">
	      				<header>
	      					{!! wp_get_attachment_image( get_sub_field('logo'), 'medium' ) !!}
	      					<h3>{!! get_sub_field('navn') !!}</h3>
	      				</header>
	      				{!! get_sub_field('forklaring') !!}
	      				<a href="{!! get_sub_field('lenke') !!}" class="linjeforklaring__lenke">
	      					{{ get_sub_field('lenketekst') }}
	      				</a>
	      			</article>
	      			<h3></h3>
	      		</div>
	      	@endwhile
	      </div>
	    </article>
	  </div>
	</div>
  @endwhile
@endsection
