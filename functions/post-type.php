<?php


add_action( 'init', 'codex_slider_init' );


function codex_slider_init() {
	$labels = array(
		'name'               => _x( 'Sliders', 'post type general name', 'dom_theme' ),
		'singular_name'      => _x( 'Slider', 'post type singular name', 'dom_theme' ),
		'menu_name'          => _x( 'Sliders', 'admin menu', 'dom_theme' ),
		'name_admin_bar'     => _x( 'Slider', 'add new on admin bar', 'dom_theme' ),
		'add_new'            => _x( 'Add New', 'slider', 'dom_theme' ),
		'add_new_item'       => __( 'Add New Slider', 'dom_theme' ),
		'new_item'           => __( 'New Slider', 'dom_theme' ),
		'edit_item'          => __( 'Edit Slider', 'dom_theme' ),
		'view_item'          => __( 'View Slider', 'dom_theme' ),
		'all_items'          => __( 'All Sliders', 'dom_theme' ),
		'search_items'       => __( 'Search Sliders', 'dom_theme' ),
		'parent_item_colon'  => __( 'Parent Sliders:', 'dom_theme' ),
		'not_found'          => __( 'No sliders found.', 'dom_theme' ),
		'not_found_in_trash' => __( 'No sliders found in Trash.', 'dom_theme' ),
	);

	$args = array(
		'labels'             => $labels,
		'public'             => true,
		'publicly_queryable' => true,
		'show_ui'            => true,
		'show_in_menu'       => true,
		'query_var'          => true,
		'rewrite'            => array( 'slug' => 'slider' ),
		'capability_type'    => 'post',
		'has_archive'        => true,
		'hierarchical'       => false,
		'menu_position'      => null,
		'supports'           => array( 'title', 'editor', 'author', 'thumbnail', 'excerpt', 'comments' )
	);

	register_post_type( 'slider', $args );


	$labels = array(
		'name'              => _x( 'Slider Categories', 'taxonomy general name' ),
		'singular_name'     => _x( 'Slider Category', 'taxonomy singular name' ),
		'search_items'      => __( 'Search Slider Categories' ),
		'all_items'         => __( 'All Slider Categories' ),
		'parent_item'       => __( 'Parent Slider Category' ),
		'parent_item_colon' => __( 'Parent Slider Category:' ),
		'edit_item'         => __( 'Edit Slider Category' ),
		'update_item'       => __( 'Update Slider Category' ),
		'add_new_item'      => __( 'Add New Slider Category' ),
		'new_item_name'     => __( 'New Slider Category Name' ),
		'menu_name'         => __( 'Slider Category' ),
	);

	$args = array(
		'hierarchical'      => true,
		'labels'            => $labels,
		'show_ui'           => true,
		'show_admin_column' => true,
		'query_var'         => true,
		'rewrite'           => array( 'slug' => 'slider_category' ),
	);

	register_taxonomy( 'slider_category', array( 'slider' ), $args );

}