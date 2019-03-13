{{--
  Template Name: Fagretninger
--}}

@extends('layouts.app')

@section('content')
  @while(have_posts()) @php the_post() @endphp
  	<div class="container">
      @foreach($fagretninger as $fagtype => $fagretninger_i_type)
      	<div class="halvside">
        <h2>{{$fagtype}}</h2>
        <ul class="lenkeliste">
        @foreach($fagretninger_i_type as $fagretning)
          <li>
            <a href="{{ $fagretning['lenke'] }}" class="lenkeliste__lenke">
              {!! $fagretning['tittel']; !!}
            </a>
          </li>
        @endforeach
      	</ul>
      </div>
      @endforeach
  	</div>
  @endwhile
@endsection
