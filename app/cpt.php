<?php
// Register Custom Post Type
function jobber_cpt() {

	$labels = array(
		'name'                  => __( 'Jobber', 'sage' ),
		'singular_name'         => __( 'Jobb', 'sage' ),
		'menu_name'             => __( 'Jobber', 'sage' ),
		'name_admin_bar'        => __( 'Jobber', 'sage' ),
		'add_new'								=> __( 'Legg til ny', 'sage' ),
		'add_new_item'          => __( 'Legg til ny jobb', 'sage' ),
		'featured_image'        => __( 'Bedriftslogo', 'sage' ),
		'set_featured_image'    => __( 'Bestem bedriftslogo', 'sage' ),
		'remove_featured_image' => __( 'Fjern bedriftslogo', 'sage' ),
		'use_featured_image'    => __( 'Bruk som bedriftslogo', 'sage' ),
	);
	$args = array(
		'label'                 => __( 'Jobb', 'sage' ),
		'description'           => __( 'Jobber (både sommerjobber og fulltidsjobber)', 'sage' ),
		'labels'                => $labels,
		'supports'              => array( 'title', 'thumbnail' ),
		'taxonomies'						=> array( 'jobbtyper' ),
		'hierarchical'          => false,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 5,
		'menu_icon'             => 'dashicons-hammer',
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => true,
		'exclude_from_search'   => false,
		'publicly_queryable'    => true,
		'capability_type'       => 'page',
	);
	register_post_type( 'jobb', $args );

}
add_action( 'init', 'jobber_cpt', 0 );

// Register Custom Taxonomy
function jobbtype_tax() {

	$labels = array(
		'name'                       => __( 'Jobbtype', 'sage' ),
		'singular_name'              => __( 'Jobbtype', 'sage' ),
		'menu_name'                  => __( 'Jobbtyper', 'sage' ),
	);
	$args = array(
		'labels'                     => $labels,
		'hierarchical'               => true,
		'public'                     => true,
		'show_ui'                    => true,
		'show_admin_column'          => true,
		'show_in_nav_menus'          => true,
		'show_tagcloud'              => true,
	);
	register_taxonomy( 'jobbtype', array( 'jobb' ), $args );

}
add_action( 'init', 'jobbtype_tax', 0 );



function fagretninger_cpt() {

	$labels = array(
		'name'                  => __( 'Fagretninger', 'sage' ),
		'singular_name'         => __( 'Fagretning', 'sage' ),
		'menu_name'             => __( 'Fagretninger', 'sage' ),
		'name_admin_bar'        => __( 'Fagretninger', 'sage' ),
		'add_new'								=> __( 'Legg til ny', 'sage' ),
		'add_new_item'          => __( 'Legg til ny fagretning', 'sage' ),
		'featured_image'        => __( 'Bedriftslogo', 'sage' ),
	);
	$args = array(
		'label'                 => __( 'Fagretning', 'sage' ),
		'description'           => __( 'Fagretninger', 'sage' ),
		'labels'                => $labels,
		'supports'              => array( 'title', 'editor' ),
		'taxonomies'						=> array( 'fagretning' ),
		'hierarchical'          => false,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 5,
		'menu_icon'             => 'dashicons-hammer',
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => true,
		'exclude_from_search'   => false,
		'publicly_queryable'    => true,
		'capability_type'       => 'page',
	);
	register_post_type( 'fagretning', $args );

}
add_action( 'init', 'fagretninger_cpt', 0 );

// Register Custom Taxonomy
function fagtype_tax() {

	$labels = array(
		'name'                       => __( 'Fag', 'sage' ),
		'singular_name'              => __( 'Fag', 'sage' ),
		'menu_name'                  => __( 'Fag', 'sage' ),
	);
	$args = array(
		'labels'                     => $labels,
		'hierarchical'               => true,
		'public'                     => true,
		'show_ui'                    => true,
		'show_admin_column'          => true,
		'show_in_nav_menus'          => true,
		'show_tagcloud'              => true,
	);
	register_taxonomy( 'fagtype', array( 'fagretning' ), $args );

}
add_action( 'init', 'fagtype_tax', 0 );