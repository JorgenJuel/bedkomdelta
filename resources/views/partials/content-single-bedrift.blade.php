<article @php post_class('tekstinnhold') @endphp>


    <aside class="tekstinnhold__sideboks">
      <div class="tekstinnhold__sideboks__logo">
        {!! get_the_post_thumbnail( null, 'logo', '' ) !!}
      </div>

      <ul class="infoliste">

        <li class="infoliste__punkt infoliste__punkt--bedrift">
          <a href="{{ get_field('sted') }}">
            {{get_field('sted')}}
          </a>
        </li>

        <li class="infoliste__punkt infoliste__punkt--bedrift">
          Arbeidssted:
          {{ get_field('sted') }}
        </li>
      </ul>
    </aside>

    <header>
      <h1>{{ get_the_title() }}</h1>      
    </header>
    

    <div class="tekstinnhold__tekst">
      @php the_content() @endphp

      <h2>Jobber</h2>
      <div class="arkivinnhold__liste">
        @php global $post @endphp
        @foreach ($stillinger as $post) 
        @php setup_postdata($post) @endphp
          @include('partials.content-'.get_post_type())
        @endforeach
        @php wp_reset_postdata() @endphp

      </div>
    </div>
</article>
