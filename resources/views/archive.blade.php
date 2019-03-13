@extends('layouts.app')

@section('content')
  @if (!have_posts())
    <div class="alert alert-warning">
      {{ __('Sorry, no results were found.', 'sage') }}
    </div>
    {!! get_search_form(false) !!}
  @endif

  <div class="arkivinnhold">
    <h1>{{App::title() }}</h1>

    {{--
    <aside class="arkivinnhold__sidebar">
      <h2>Filtrer resultatet</h2>

      <form class="filtermeny">
        <div class="filtermeny__gruppe">
          <h3 class="filtermeny__gruppenavn">Jobbtype</h3>
          @foreach($jobbtyper as $jobbtype)
            <label class="filtermeny__checkbox">
              <input type="checkbox" name="jobbtype" value="{{$jobbtype->term_id}}"> {{ $jobbtype->name }}
            </label>
          @endforeach
        </div>

        <div class="filtermeny__knapper">
          <input type="submit" value="Filtrer" class="knapp knapp--hvit">
        </div>
      </form>
    </aside>
    --}}
    <div class="arkivinnhold__liste">
      @while (have_posts()) @php the_post() @endphp
        @include('partials.content-'.get_post_type())
      @endwhile
    </div>
  </div>

  {!! get_the_posts_navigation() !!}
@endsection
