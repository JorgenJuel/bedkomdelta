<?php
// Register Custom Post Type
function bedrifter_cpt() {

	$labels = array(
		'name'                  => __( 'Bedrifter', 'sage' ),
		'singular_name'         => __( 'Bedrift', 'sage' ),
		'menu_name'             => __( 'Bedrifter', 'sage' ),
		'name_admin_bar'        => __( 'Bedrifter', 'sage' ),
		'add_new'								=> __( 'Legg til ny', 'sage' ),
		'add_new_item'          => __( 'Legg til ny bedrift', 'sage' ),
		'featured_image'        => __( 'Bedriftslogo', 'sage' ),
		'set_featured_image'    => __( 'Bestem bedriftslogo', 'sage' ),
		'remove_featured_image' => __( 'Fjern bedriftslogo', 'sage' ),
		'use_featured_image'    => __( 'Bruk som bedriftslogo', 'sage' ),
	);
	$args = array(
		'label'                 => __( 'Bedrift', 'sage' ),
		'description'           => __( 'Bedrifter', 'sage' ),
		'labels'                => $labels,
		'supports'              => array( 'title', 'thumbnail', 'editor' ),
		'hierarchical'          => false,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 5,
		'menu_icon'             => 'dashicons-building',
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => 'bedrifter',
		'exclude_from_search'   => false,
		'publicly_queryable'    => true,
		'capability_type'       => 'page',
		'show_in_rest'					=> true,
	);
	register_post_type( 'bedrift', $args );

}
add_action( 'init', 'bedrifter_cpt', 0 );// Register Custom Post Type

function studenter_cpt() {

	$labels = array(
		'name'                  => __( 'Studenter', 'sage' ),
		'singular_name'         => __( 'Student', 'sage' ),
		'menu_name'             => __( 'Studenter', 'sage' ),
		'name_admin_bar'        => __( 'Studenter', 'sage' ),
		'add_new'								=> __( 'Legg til ny', 'sage' ),
		'add_new_item'          => __( 'Legg til ny student', 'sage' ),
		'featured_image'        => __( 'Bilde', 'sage' ),
		'set_featured_image'    => __( 'Bestem Bilde', 'sage' ),
		'remove_featured_image' => __( 'Fjern Bilde', 'sage' ),
		'use_featured_image'    => __( 'Bruk som Bilde', 'sage' ),
	);
	$args = array(
		'label'                 => __( 'Student', 'sage' ),
		'description'           => __( 'Studenter', 'sage' ),
		'labels'                => $labels,
		'supports'              => array( 'title', 'thumbnail', 'editor' ),
		'hierarchical'          => false,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 5,
		'menu_icon'             => 'dashicons-welcome-learn-more',
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => 'alumni',
		'exclude_from_search'   => false,
		'publicly_queryable'    => true,
		'capability_type'       => 'page',
		'show_in_rest'					=> true,
	);
	register_post_type( 'student', $args );

}
add_action( 'init', 'studenter_cpt', 0 );

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
		'supports'              => array( 'title', 'thumbnail', 'editor' ),
		'taxonomies'						=> array( 'jobbtype' ),
		'hierarchical'          => false,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 5,
		'menu_icon'             => 'dashicons-hammer',
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => 'jobber',
		'exclude_from_search'   => false,
		'publicly_queryable'    => true,
		'capability_type'       => 'page',
		'show_in_rest'					=> true,
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
		'show_in_rest'							 => true,
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

// Register Custom Post Type
function emne_cpt() {

	$labels = array(
		'name'                  => _x( 'Emner', 'Post Type General Name', 'sage' ),
		'singular_name'         => _x( 'Emne', 'Post Type Singular Name', 'sage' ),
		'menu_name'             => __( 'Emner', 'sage' ),
		'name_admin_bar'        => __( 'Emner', 'sage' ),
		'archives'              => __( 'Emnearkiv', 'sage' ),
		'attributes'            => __( 'Emneattributter', 'sage' ),
		'parent_item_colon'     => __( 'Foreldreemne', 'sage' ),
		'all_items'             => __( 'Alle emner', 'sage' ),
		'add_new_item'          => __( 'Legg til nytt emne', 'sage' ),
		'add_new'               => __( 'Legg til nytt', 'sage' ),
		'new_item'              => __( 'Nytt emne', 'sage' ),
		'edit_item'             => __( 'Rediger emne', 'sage' ),
		'update_item'           => __( 'Oppdater emne', 'sage' ),
		'view_item'             => __( 'Vis emne', 'sage' ),
		'view_items'            => __( 'Vis emner', 'sage' ),
		'search_items'          => __( 'Søk blant emner', 'sage' ),
		'not_found'             => __( 'Ingen emner funnet', 'sage' ),
		'not_found_in_trash'    => __( 'Ingen funnet i papirkurven', 'sage' ),
		'items_list'            => __( 'Emneliste', 'sage' ),
		'items_list_navigation' => __( 'Emnelistenavigasjon', 'sage' ),
		'filter_items_list'     => __( 'Filtrer emneliste', 'sage' ),
	);
	$args = array(
		'label'                 => __( 'Emne', 'sage' ),
		'description'           => __( 'Emne', 'sage' ),
		'labels'                => $labels,
		'supports'              => array( 'title', 'editor' ),
		'hierarchical'          => false,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 5,
		'menu_icon'             => 'dashicons-category',
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => 'emner',
		'exclude_from_search'   => false,
		'publicly_queryable'    => true,
		'capability_type'       => 'page',
	);
	register_post_type( 'emne', $args );

}
add_action( 'init', 'emne_cpt', 0 );