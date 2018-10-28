<article @php post_class('tekstinnhold') @endphp>
    <header>
      @if(has_post_thumbnail())
        <div class="tekstinnhold__header__logo">
          {!! get_the_post_thumbnail( null, 'logo', '' ) !!}
        </div>
      @endif
      <h1>{{ get_the_title() }}</h1>
    </header>

    <div class="tekstinnhold__intro">
      {!! get_field('innledning') !!}
    </div>

    @php the_content() @endphp
</article>
