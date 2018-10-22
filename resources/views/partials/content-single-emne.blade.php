<article @php post_class() @endphp>
  <header>
    <h1 class="entry-title">{!! get_the_title() !!}</h1>
  </header>
  <div class="entry-content">
    @php the_content() @endphp
  </div>
  <footer class="emnenavigasjon">
    <div class="emnenavigasjon__emner emnenavigasjon__emner--tidligere">

      @php $felter = ["nodvendige_fag" => "Nødvendige fag", "anbefalte_fag" => "Anbefalte fag", "lure_fag" => "Fag som hjelper litt"] @endphp
      @foreach($felter as $felt => $tittel)
        @php $emner = get_field($felt); @endphp
        @if($emner)
          <h3>{{ $tittel }}</h3>
          <ul>
          @foreach($emner as $id)
            <li>
              <a href="{{ get_the_permalink($id) }}" class="tidligere">
                {!! get_the_title($id) !!}
              </a>
            </li>
          @endforeach
          </ul>
        @endif
      @endforeach
    </div>
    <div class="emnenavigasjon__emner emnenavigasjon__emner--senere">

        @php
        $emner = get_posts(array(
          'post_type' => 'emne',
          'meta_query' => array(
            'relation' => 'OR',
            array(
              'key' => 'nodvendige_fag', // name of custom field
              'value' => '"' . get_the_ID() . '"', // matches exactly "123", not just 123. This prevents a match for "1234"
              'compare' => 'LIKE'
            ),
            array(
              'key' => 'anbefalte_fag', // name of custom field
              'value' => '"' . get_the_ID() . '"', // matches exactly "123", not just 123. This prevents a match for "1234"
              'compare' => 'LIKE'
            ),
            array(
              'key' => 'lure_fag', // name of custom field
              'value' => '"' . get_the_ID() . '"', // matches exactly "123", not just 123. This prevents a match for "1234"
              'compare' => 'LIKE'
            )
          )
        ));
        @endphp
          <h3>Emner som bygger på dette:</h3>
          <ul>
            @if($emner)
              @foreach($emner as $emne)
                <li>
                  <a href="{{ get_the_permalink($emne->ID) }}" class="senere">
                    {!! get_the_title($emne->ID) !!}
                  </a>
                </li>
              @endforeach
            @else
              <li>Ingen emner bygger på dette</li>
            @endif
          </ul>
    </div>
  </footer>
</article>
