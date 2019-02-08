<?php

namespace App;

use Sober\Controller\Controller;

class SingleJobb extends Controller
{
  public function bedriftslogo() {
    $bedrift = get_field('bedrift');
    if($bedrift) {
      return get_the_post_thumbnail( $bedrift->ID, 'logo');
    }
    return null;
  }

  public function soknadsfrist() {
    $frist = get_field('soknadsfrist');

    return $frist;
  }

  public function soknadslenke() {
    $lenke = get_field('lenke');

    return $lenke;
  }

  public function bedriftslenke() {
    $bedrift = get_field('bedrift');
    if($bedrift) {
      return get_field( 'nettside', $bedrift->ID);
    }
    return null;
  }

  public function bedriftslenke() {
    $bedrift = get_field('bedrift');
    if($bedrift) {
      return get_the_title( $bedrift->ID );
    }
    return null;
  }
}
