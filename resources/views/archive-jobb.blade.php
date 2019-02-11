@extends('layouts.app')

@section('content')
  @if (!have_posts())
    <div class="alert alert-warning">
      {{ __('Sorry, no results were found.', 'sage') }}
    </div>
    {!! get_search_form(false) !!}
  @endif

  <div class="arkivinnhold">
    <div class="arkivinnhold__liste">
      @while (have_posts()) @php the_post() @endphp
        @include('partials.content-'.get_post_type())
      @endwhile
    </div>
    <aside class="arkivinnhold__sidebar">
      
    </aside>
  </div>

  {!! get_the_posts_navigation() !!}
@endsection
