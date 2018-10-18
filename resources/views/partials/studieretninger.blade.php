@php
$args = new WP_Query(['post_type' => 'fagretning', 'posts_per_page' => -1]);
$fagtyper = get_terms( ['taxonomy' => 'fagtype', 'hide_empty' => 'false'] );
@endphp
<div class="container">
  @foreach($fagtyper as $fag)
    <h2>{{$fag->name}}</h2>
    @php 
      $query = new WP_Query([
        'post_type' => 'fagretning', 
        'tax_query' => [
          [
            'taxonomy' => 'fagtype',
            'field' => 'id',
            'terms' => $fag->term_id
          ]
        ]
      ])
    @endphp
    <div class="tekstbokser">
    @while($query->have_posts()) @php($query->the_post())
      <a href="{{get_the_permalink() }}" class="tekstbokser__boks">
        {{get_the_title()}}
      </a>
    @endwhile
    </div>
    @php(wp_reset_postdata())
  @endforeach

</div>