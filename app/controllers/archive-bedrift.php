<?php

namespace App;

use Sober\Controller\Controller;

class ArchiveBedrift extends Controller
{
  public static function bedriftslogo() {
    return get_the_post_thumbnail( null, 'logo', '' );
  }

  public static function soknadsfrist() {
    $frist = get_field('soknadsfrist');

    return $frist;
  }

  public static function soknadslenke() {
    $lenke = get_field('lenke');

    return $lenke;
  }

  public static function bedriftslenke() {
    $bedrift = get_field('bedrift');
    if($bedrift) {
      return get_the_permalink($bedrift->ID);
    }
    return null;
  }

  public static function bedrift() {
    $bedrift = get_field('bedrift');
    if($bedrift) {
      return get_the_title( $bedrift->ID );
    }
    return null;
  }

  public static function sted() {
    return get_field('sted');
  }

  public static function stillingstype() {
    $typer = get_the_terms( get_the_ID(), 'jobbtype' );

    if(is_array($typer)) {
      return $typer[0]->name;
    }

    return false;
  }

  public function jobbtyper() {
    $typer = get_terms([
      'taxonomy' => 'jobbtype', 
      'hide_empty' => true 
    ]);

    return $typer;
  }
}
