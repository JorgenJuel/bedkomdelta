<header class="topptekst">
	<div class="merke">
		<a href="https://deltahouse.no" target="_blank" class="merke__lenke">Linjeforeningen for matematikk og fysikk ved NTNU</a>
	</div>
  <div class="flexholder">
    <a class="logo" href="{{ home_url('/') }}"><img src="@asset('images/deltalogo.svg')">
BedKom<br>Delta</a>
    <nav class="navigasjonsholder">
      @if (has_nav_menu('primary_navigation'))
        {!! bem_menu('primary_navigation', 'navigasjon') !!}
			@endif
    </nav>
    <button class="mobilmeny">
    	<span class="mobilmeny__linje"></span>
    	<span class="mobilmeny__linje"></span>
    	<span class="mobilmeny__linje"></span>
    </button>
  </div>

  @if( $vis_studentmeny )
    {!! bem_menu('studentsider', 'undermeny') !!}
  @endif
</header>
