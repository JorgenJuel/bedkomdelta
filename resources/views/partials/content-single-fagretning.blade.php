@php
$post_id = get_the_id();
$id = get_the_terms(get_the_ID(), 'fagtype')[0]->term_id;
$query = new WP_Query([
  'post_type' => 'fagretning', 
  'tax_query' => [
    [
      'taxonomy' => 'fagtype',
      'field' => 'id',
      'terms' => $id
    ]
  ]
]);
@endphp

<article @php post_class() @endphp>
  <header>
    <nav class="navigeringsknapper">
      <ul class="navigeringsknapper__liste">
        
        @while( $query->have_posts() ) @php $query->the_post() @endphp
        <li class="navigeringsknapper__element">
          <a href="{{ get_the_permalink() }}" class="navigeringsknapper__lenke {{ get_the_id() === $post_id ? 'navigeringsknapper__lenke--aktiv' : null}}">
            {{ get_the_title() }}
          </a>
        @endwhile
        </li>
        @php wp_reset_postdata(); @endphp
      </ul>
    </nav>
  </header>
  <article class="tekstinnhold">
    <header>
      <h1>{{ get_the_title() }}</h1>
    </header>

    <div class="tekstinnhold__intro">
      {!! get_field('innledning') !!}
    </div>
    
    <aside class="tekstinnhold__sideboks">
        @php $emner = get_field('anbefalte_emner'); @endphp
        @if($emner)
          <h3>{{ 'Anbefalte emner' }}</h3>
          <ul>
          @foreach($emner as $id)
            <li>
              <a href="{{ get_the_permalink($id) }}">
                {!! get_the_title($id) !!}
              </a>
            </li>
          @endforeach
          </ul>
        @endif
    </aside>

    @php the_content() @endphp

    
    @if($fagplan)
    <div class="fagplan">
      <table>
        @php $oldSemester = "" @endphp
        @foreach(['Høst' => 'hostfag', 'Vår' => 'varfag'] as $navn => $semesterNokkel)
          @foreach([0,1,2,3] as $index)
            <tr>
              @if($oldSemester !== $semesterNokkel)
                @php $oldSemester = $semesterNokkel @endphp
                <td rowspan="4">{{ $navn }}</td>
              @endif
              @foreach($fagplan as $aar)
                @php $semester = $aar[$semesterNokkel]; @endphp  
                @if(array_key_exists($index, $semester))
                @php $emne = $semester[$index]; @endphp
                <td>
                  <a href="{{ get_the_permalink($emne->ID ) }}">
                    {{ get_field('fagkode', $emne->ID) }}
                  </a>
                </td>
                @else
                <td>Valgfritt emne</td>
                @endif
              @endforeach
            </tr>
          @endforeach
        @endforeach
      </table>
    </div>
    @endif

    @if($jobber->have_posts())
      <section class="listeseksjon">
      <h3 class="listeseksjon__overskrift">Jobber</h3>
      <div class="listeseksjon__wrapper">
        @while($jobber->have_posts()) @php $jobber->the_post() @endphp
        <div class="listeseksjon__element">
          @if(has_post_thumbnail())
            <div class="listeseksjon__element__bilde">
              <a href="{{ get_the_permalink() }}">  
                {!! get_the_post_thumbnail( null, 'logo', '' ) !!}
              </a>
            </div>
          @endif
          <div class="listeseksjon__element__tekst">
            <a href="{{ get_the_permalink() }}">
              <h4 class="listeseksjon__element__overskrift">
                {{ get_the_title() }}
              </h4>
            </a>

            {!! get_field('innledning') !!}
          </div>
        </div>
        @endwhile
      </div>
      @php wp_reset_postdata() @endphp
    </section>
    @endif

    <footer>
      <p class="tekstinnhold__forfattere"><strong>Skrevet av:</strong>
      @php $i = 0; @endphp
      @foreach(get_field('forfattere') as $forfatter)
        {{ $forfatter["user_nicename"] }}@if($i > 0),@endif
        @php $i++ @endphp
      @endforeach
      </p>
      <p class="tekstinnhold__oppdatert"><strong>Sist endret:</strong> <time class="updated" datetime="{{ get_post_time('c', true) }}">{{ get_the_date() }}</time></p>
    </footer>
  </article>
</article>

