<?php
namespace App;

function create_edge($id, $fagkode, $type, $i) {
  return [
    'group' => 'edges',
    'data' => [
      'id' => $fagkode . $i,
      'type' => $type,
      'source' => get_field('fagkode', $id),
      'target' => $fagkode
    ]
  ];
}

function subjects() {

  $data = [];

  $courses = new \WP_Query(['post_type' => 'emne', 'posts_per_page' => -1]);

  while($courses->have_posts()) {
    $courses->the_post();
    $title = str_replace('&#8211;', '&', get_the_title());
    $fagkode = get_field('fagkode');
    $course = [
      'group' => 'nodes',
      'data' => [
        'id' => $fagkode,
        'fagkode' => $title
      ]
    ];

    $data[] = $course;
    $i = 0;
    foreach(get_field('nodvendige_fag') as $id) {
      $data[] = create_edge($id, $fagkode, 'nodvendige_fag', $i);
      $i++;
    }
    foreach(get_field('anbefalte_fag') as $id) {
      $data[] = create_edge($id, $fagkode, 'anbefalte_fag', $i);
      $i++;
    }
    foreach(get_field('lure_fag') as $id) {
      $data[] = create_edge($id, $fagkode, 'lure_fag', $i);
      $i++;
    }

    $data[] = $course;
  }

  echo wp_json_encode( $data );

  wp_die();
}

add_action('wp_ajax_nopriv_subjects', __NAMESPACE__ . '\\subjects');
add_action('wp_ajax_subjects', __NAMESPACE__ . '\\subjects');