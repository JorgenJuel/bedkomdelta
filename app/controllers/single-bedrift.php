<?php

namespace App;

use Sober\Controller\Controller;

class SingleBedrift extends Controller
{

  public function stillinger() {
    $query = new \WP_Query([
      'post_type' => 'jobb',
      'posts_per_page' => 4,
      'meta_key' => 'bedrift',
      'meta_value' => get_the_ID(),
      'meta_compare' => '=',
    ]);

    $result = [];

    while($query->have_posts()){
      $query->the_post();

      $bedrift = get_field('bedrift');
      $logo = $bedrift ? get_the_post_thumbnail( $bedrift->ID, 'logo') : null;

      array_push($result, get_the_ID());
    }

    wp_reset_postdata();

    return $result;
  }
}
