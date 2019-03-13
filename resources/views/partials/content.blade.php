<article @php post_class('arkivtekst') @endphp>
  <aside class="arkivtekst__logo">
    <a href="{{ get_permalink() }}">
      {!! get_the_post_thumbnail( null, 'logo', '' ); !!}
    </a>    
  </aside>
  <div class="arkivtekst__hoyre">
    <header class="arkivtekst__header">
      <h2 class="arkivtekst__overskrift"><a href="{{ get_permalink() }}">{{ get_the_title() }}</a></h2>
    </header>
    <div class="arkivtekst__innhold">
      @php the_excerpt() @endphp
    </div>
  </div>
</article>
