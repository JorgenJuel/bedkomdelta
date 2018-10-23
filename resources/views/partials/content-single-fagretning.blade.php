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

