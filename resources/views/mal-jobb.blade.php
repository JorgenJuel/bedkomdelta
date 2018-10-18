{{--
  Template Name: Jobbmal
--}}

@extends('layouts.app')

@section('content')
  @while(have_posts()) @php the_post() @endphp
  <div class="hovedinnhold">
    <div class="container">
      @include('partials.studieretninger')
    </div>
  </div>
  @php /*
    <nav class="fanemeny">
      <ul class="fanemeny__liste">
        <li class="fanemeny__punkt">
          <button class="fanemeny__knapp--aktiv fanemeny__knapp fanemeny__knapp--karrierer" data-target="studieretninger">
            <span>Studieretninger</span>
          </button>
        </li>
        <li class="fanemeny__punkt">
          <button class="fanemeny__knapp fanemeny__knapp--jobber" data-target="jobbinnhold">
            <span>Jobber</span>
          </button>
        </li>
      </ul>
    </nav>
    <div class="faner">
      <div class="faner__fane faner__fane--aktiv" id="studieretninger">
        @include('partials.studieretninger')
      </div>
      <div class="faner__fane" id="jobbinnhold">
        @include('partials.page-header')
        @include('partials.jobbinnhold')
      </div>
    </div>
    */
    @endphp
  @endwhile
@endsection
