<article @php post_class('arkivtekst') @endphp>
  <aside class="arkivtekst__logo">
    <a href="{{ get_permalink() }}">
      {!! ArchiveJobb::bedriftslogo() !!}
    </a>    
  </aside>
  <div class="arkivtekst__hoyre">
    <header class="arkivtekst__header">
      <h2 class="arkivtekst__overskrift"><a href="{{ get_permalink() }}">{{ get_the_title() }}</a></h2>
      
      <div class="arkivtekst__meta">
        <span class="arkivtekst__frist">
          {{ ArchiveJobb::soknadsfrist() }}
        </span>

        <span class="arkivtekst__sted">
          {{ ArchiveJobb::sted() }}
        </span>

        <span class="arkivtekst__stillingstype">
          {{ ArchiveJobb::stillingstype() }}
        </span>

        <span class="arkivtekst__bedrift">
          <a href="{{ ArchiveJobb::bedriftslenke() }}">
            {{ ArchiveJobb::bedrift() }}
          </a>
        </span>
      </div>
    </header>
    <div class="arkivtekst__innhold">
      @php the_excerpt() @endphp
    </div>
  </div>
</article>
