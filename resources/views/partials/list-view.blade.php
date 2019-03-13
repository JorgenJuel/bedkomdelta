
    <div class="trippel">
      <div class="trippel__boks">
        <h2>Fagretninger</h2>

        <ul class="lenkeliste">
          @foreach($fagretninger as $fagtype => $fagretninger_i_type)
            <li><strong>{{$fagtype}}</strong></li>
            @foreach($fagretninger_i_type as $fagretning)
              <li>
                <a href="{{ $fagretning['lenke'] }}" class="lenkeliste__lenke">
                  {!! $fagretning['tittel']; !!}
                </a>
              </li>
            @endforeach
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

        <a href="{{ get_post_type_archive_link( 'jobb' ) }}" class="knapp knapp--lenke">Se alle stillinger
        </a>
      </div>

      <div class="trippel__boks">
        {{--
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

        <a href="{{ get_post_type_archive_link( 'emner' ) }}" class="knapp knapp--lenke">Se alle emnene
        </a>
         --}}
      </div>
    </div>