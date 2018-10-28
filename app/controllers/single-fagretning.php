<?php

namespace App;

use Sober\Controller\Controller;

class SingleFagretning extends Controller
{
  public function sommerjobbQuery() {
    return array('post_type' => 'jobb', 'post_per_page' => -1);
  }
  public function fagplan() {
    return get_field('fagplan');
  }

  public function jobber() {
    $query = new \WP_Query([
      'post_type' => 'jobb', 
      'meta_query' => [
        [
          'key' => 'fagretninger', // name of custom field
          'value' => '"' . get_the_ID() . '"', // matches exactly "123", not just 123. This prevents a match for "1234"
          'compare' => 'LIKE'
        ]
      ],
      'posts_per_page' => 3,
    ]);
    return $query;
  }

  public function termId() {
    $terms = get_the_terms(get_the_ID(), 'fagtype');
    if(is_array($terms)){
      return $terms[0]->term_id; 
    }
    return null;
  }
}
