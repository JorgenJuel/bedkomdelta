<?php

namespace App;

use Sober\Controller\Controller;

class App extends Controller
{
    public function siteName()
    {
        return get_bloginfo('name');
    }

    public function vis_studentmeny() {
      $rightPage = get_field('vis_undermeny') || is_post_type_archive( ['jobb', 'bedrift', 'student', 'emne'] );
      return $rightPage && has_nav_menu('studentsider');
    }

    public static function title()
    {
        if (is_home()) {
            if ($home = get_option('page_for_posts', true)) {
                return get_the_title($home);
            }
            return __('Latest Posts', 'sage');
        }
        if (is_post_type_archive( 'student' )) {
          return __('Tidligere studenter', 'sage');
        }
        if (is_post_type_archive( 'bedrift' )) {
          return __('Bedrifter', 'sage');
        }
        if (is_post_type_archive( 'emne' )) {
          return __('Emner', 'sage');
        }
        if (is_archive()) {
            return get_the_archive_title();
        }
        if (is_search()) {
            return sprintf(__('Search Results for %s', 'sage'), get_search_query());
        }
        if (is_404()) {
            return __('Not Found', 'sage');
        }
        return get_the_title();

    }

    public static function isColorDark($color) {
        $red = hexdec(substr($color, 1,2));
        $green = hexdec(substr($color, 3, 2));
        $blue = hexdec(substr($color, 5, 2));
        $luma = 0.2126 * $red + 0.7152 * $green + 0.0722 * $blue;
        return $luma < 80;

    }
    public static function invertertKlasse($class, $color){
        if(App::isColorDark($color)){
            return $class . " " .$class . "--invertert";
        }else{
            return $class;   
        }
    }

  public function fagretninger() {
    $query = new \WP_Query([
      'post_type' => 'fagretning',
      'posts_per_page' => -1
    ]);


    $result = [];

    $fagtyper = get_terms('fagtype');
    foreach ($fagtyper as $fagtype) {
      $result[$fagtype->name] = [];
    }

    while($query->have_posts()){
      $query->the_post();

      $terms = get_the_terms(get_the_ID(), 'fagtype');
      if(is_array($terms)){
        array_push($result[$terms[0]->name], [
          'tittel' => get_the_title(),
          'lenke' => get_the_permalink()
        ]);
      }
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
