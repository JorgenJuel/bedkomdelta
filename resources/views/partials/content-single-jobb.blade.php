<article @php post_class('tekstinnhold') @endphp>

    <header>
      @if(has_post_thumbnail())
        <div class="tekstinnhold__header__logo">
          {!! get_the_post_thumbnail( null, 'logo', '' ) !!}
        </div>
      @endif
      <h1>{{ get_the_title() }}</h1>      
    </header>

    <aside class="tekstinnhold__sideboks">
      <div class="tekstinnhold__sideboks__logo">
        {!! $bedriftslogo !!}
      </div>

      <ul class="infoliste">

        <li class="infoliste__punkt infoliste__punkt--bedrift">
          Bedrift: 
          {{ $bedrift }}
        </li>

        <li class="infoliste__punkt infoliste__punkt--klokke">
          Søknadsfrist: 
          {{ $soknadsfrist }}
        </li>

        <li class="infoliste__punkt infoliste__punkt--bedrift">
          Arbeidssted:
          {{ $sted }}
        </li>

        <li class="infoliste__punkt infoliste__punkt--bedrift">
          Stillingstype
          {{ $stillingstype }}
        </li>
      </ul>

      <a href="{{ $soknadslenke }}">
        Søk her
      </a>
    </aside>
    

    <div class="tekstinnhold__tekst">
      @php the_content() @endphp
    </div>
</article>
