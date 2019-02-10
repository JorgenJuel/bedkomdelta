<?php

namespace App;

use Sober\Controller\Controller;

class FrontPage extends Controller
{

  public function fagretninger() {
    $query = new \WP_Query([
      'post_type' => 'fagretning',
      'posts_per_page' => -1
    ]);

    $result = [];

    while($query->have_posts()){
      $query->the_post();

      array_push($result, [
        'tittel' => get_the_title(),
        'lenke' => get_the_permalink()
      ]);
    }

    wp_reset_postdata();

    return $result;
  }

  public function emner() {
    $query = new \WP_Query([
      'post_type' => 'emne',
      'posts_per_page' => 10,
      'orderby' => 'rand'
    ]);

    $result = [];

    while($query->have_posts()){
      $query->the_post();

      array_push($result, [
        'tittel' => get_the_title(),
        'lenke' => get_the_permalink()
      ]);
    }

    wp_reset_postdata();

    return $result;
  }

  public function stillinger() {
    $query = new \WP_Query([
      'post_type' => 'jobb',
      'posts_per_page' => 4
    ]);

    $result = [];

    while($query->have_posts()){
      $query->the_post();

      $bedrift = get_field('bedrift');
      $logo = $bedrift ? get_the_post_thumbnail( $bedrift->ID, 'logo') : null;

      array_push($result, [
        'tittel' => get_the_title(),
        'lenke' => get_the_permalink(),
        'logo' => $logo,
        'frist' => get_field('soknadsfrist')
      ]);
    }

    wp_reset_postdata();

    return $result;
  }

}
