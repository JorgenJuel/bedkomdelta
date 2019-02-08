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
}
