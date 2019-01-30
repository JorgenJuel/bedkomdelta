{{--
  Template Name: Fagvelger
--}}

@extends('layouts.app')

@section('content')
  @while(have_posts()) @php the_post() @endphp
  <div class="hovedinnhold">
    <div class="container">
      <h1>{{ get_the_title() }}</h1>
      @php the_content() @endphp

      <div id="fagvelgeren">
      </div>
    </div>
  </div>
  @endwhile
@endsection
