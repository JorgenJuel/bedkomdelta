{{--
  Template Name: Ansatte
--}}

@extends('layouts.app')

@section('content')
  @while(have_posts()) @php the_post() @endphp
  <div class="hovedinnhold">
    <div class="container">
      <h1>{{ get_the_title() }}</h1>

      <div class="medlemmer">
      @while(have_rows('medlemmer')) @php(the_row())
        <div class="medlemmer__medlem">
          @if(get_sub_field('bilde'))
            {!! wp_get_attachment_image( get_sub_field('bilde'), 'profilbilde', false, '' ); !!}
          @endif
          <p class="medlemmer__medlem__innhold">
            <strong>{{ get_sub_field('navn') }}<br></strong>
            @if(get_sub_field('epost'))
              <a href="mailto:{{ get_sub_field('epost') }}">
              {{ get_sub_field('epost') }}</a><br>
            @endif
            @if(get_sub_field('telefon'))
              <a href="tel:{{ get_sub_field('telefon') }}">
              {{ get_sub_field('telefon') }}</a><br>
            @endif
          </p>
        </div>
      @endwhile
      </div>
    </div>
  </div>
  @endwhile
@endsection
