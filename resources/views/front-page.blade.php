@extends('layouts.app')

@section('content')
  @while(have_posts()) @php the_post() @endphp
    @include('partials.page-header')

    <div class="container">

    <div class="trippel">
      <div class="trippel__boks">
        <h2>Fagretninger</h2>

        <ul class="lenkeliste">
          @foreach($fagretninger as $fagretning)
            <li>
              <a href="{{ $fagretning['lenke'] }}" class="lenkeliste__lenke">
                {!! $fagretning['tittel']; !!}
              </a>
            </li>
          @endforeach
        </ul>
      </div>

      <div class="trippel__boks">
        <h2>Stillinger</h2>

        <ul class="lenkeliste">
          @foreach($stillinger as $stilling)
          <li>
            <a href="{{$stilling['lenke'] }}" class="lenkeliste__lenke stillingslenke">
              <span class="stillingslenke__logo">
                {!! $stilling['logo'] !!}
              </span>
              <span class="stillingslenke__tidspunkt">
                {{ $stilling['frist'] }}
              </span>
              <span class="stillingslenke__tittel">
                {{ $stilling['tittel'] }}
              </span>
            </a>
          </li>
          @endforeach
        </ul>
      </div>

      <div class="trippel__boks">
        <h2>Tilfeldige Emner</h2>
        <ul class="lenkeliste">
          @foreach($emner as $emne)
            <li>
              <a href="{{ $emne['lenke'] }}" class="lenkeliste__lenke">
                {!! $emne['tittel']; !!}
              </a>
            </li>
          @endforeach
        </ul>
      </div>
    </div>

    </div>
  @endwhile
@endsection
