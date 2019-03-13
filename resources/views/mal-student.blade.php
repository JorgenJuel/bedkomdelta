{{--
  Template Name: Studentside
--}}

@extends('layouts.app')

@section('content')
  @while(have_posts()) @php the_post() @endphp
    @include('partials.content-page')

    <div class="container">
		@if (has_nav_menu('studentsider'))
		    {!! bem_menu('studentsider', 'boksnavigasjon') !!}
		@endif
	</div>
  @endwhile
@endsection
