<?php
/**
 * Declare custom post types for the theme.
 * Yes, this is "supposed" to be in a plugin. ¯\_(ツ)_/¯
 *
 * @package pitchfork-students
 */

/**
 * Register custom post type for student organizations
 * SLUG: studentorg
 */
function pitchfork_students_studentorg_cpt() {

	$labels = array(
		'name'                  => _x( 'Student Orgs', 'Post Type General Name', 'pitchfork-students' ),
		'singular_name'         => _x( 'Student Org', 'Post Type Singular Name', 'pitchfork-students' ),
		'menu_name'             => __( 'Student Orgs', 'pitchfork-students' ),
		'name_admin_bar'        => __( 'Student Orgs', 'pitchfork-students' ),
		'archives'              => __( 'Student Orgs', 'pitchfork-students' ),
		'attributes'            => __( 'Student Org attributes', 'pitchfork-students' ),
		'parent_item_colon'     => __( 'Parent Student Org:', 'pitchfork-students' ),
		'all_items'             => __( 'All Student Orgs', 'pitchfork-students' ),
		'add_new_item'          => __( 'Add New Student Org', 'pitchfork-students' ),
		'add_new'               => __( 'Add New', 'pitchfork-students' ),
		'new_item'              => __( 'New Student Org', 'pitchfork-students' ),
		'edit_item'             => __( 'Edit Student Org', 'pitchfork-students' ),
		'update_item'           => __( 'Update Student Org', 'pitchfork-students' ),
		'view_item'             => __( 'View Student Org', 'pitchfork-students' ),
		'view_items'            => __( 'View Student Orgs', 'pitchfork-students' ),
		'search_items'          => __( 'Search Student Org', 'pitchfork-students' ),
		'not_found'             => __( 'Not found', 'pitchfork-students' ),
		'not_found_in_trash'    => __( 'Not found in Trash', 'pitchfork-students' ),
		'featured_image'        => __( 'Featured Image', 'pitchfork-students' ),
		'set_featured_image'    => __( 'Set featured image', 'pitchfork-students' ),
		'remove_featured_image' => __( 'Remove featured image', 'pitchfork-students' ),
		'use_featured_image'    => __( 'Use as featured image', 'pitchfork-students' ),
		'insert_into_item'      => __( 'Insert into Student Org', 'pitchfork-students' ),
		'uploaded_to_this_item' => __( 'Uploaded to this student org', 'pitchfork-students' ),
		'items_list'            => __( 'Student Orgs list', 'pitchfork-students' ),
		'items_list_navigation' => __( 'Student Orgs list navigation', 'pitchfork-students' ),
		'filter_items_list'     => __( 'Filter student orgs list', 'pitchfork-students' ),
	);
	$args = array(
		'label'                 => __( 'Student Org', 'pitchfork-students' ),
		'description'           => __( 'A student organization', 'pitchfork-students' ),
		'labels'                => $labels,
		'supports'              => array( 'title', 'editor', 'thumbnail', 'revisions', 'excerpt' ),
		'taxonomies'            => array( 'orgtype' ),
		'hierarchical'          => false,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 20,
		'menu_icon'             => 'dashicons-megaphone',
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => true,
		'exclude_from_search'   => false,
		'publicly_queryable'    => true,
		'capability_type'       => 'page',
		'show_in_rest'          => true,
	);
	register_post_type( 'studentorg', $args );

}
add_action( 'init', 'pitchfork_students_studentorg_cpt', 0 );
add_theme_support( 'post-thumbnails' );


/**
 * Register custom post type for student organizations
 * SLUG: orgtype
 * CPT: studentorg
 */
function pitchfork_students_orgtype_tax() {

	$labels = array(
		'name'                       => _x( 'Student Org Types', 'Taxonomy General Name', 'pitchfork-students' ),
		'singular_name'              => _x( 'Student Org Type', 'Taxonomy Singular Name', 'pitchfork-students' ),
		'menu_name'                  => __( 'Org Type', 'pitchfork-students' ),
		'all_items'                  => __( 'All Org Types', 'pitchfork-students' ),
		'parent_item'                => __( 'Parent Org Type', 'pitchfork-students' ),
		'parent_item_colon'          => __( 'Parent Org Type:', 'pitchfork-students' ),
		'new_item_name'              => __( 'New Org Type Name', 'pitchfork-students' ),
		'add_new_item'               => __( 'Add New Org Type', 'pitchfork-students' ),
		'edit_item'                  => __( 'Edit Org Type', 'pitchfork-students' ),
		'update_item'                => __( 'Update Org Type', 'pitchfork-students' ),
		'view_item'                  => __( 'View Org Type', 'pitchfork-students' ),
		'separate_items_with_commas' => __( 'Separate types with commas', 'pitchfork-students' ),
		'add_or_remove_items'        => __( 'Add or remove types', 'pitchfork-students' ),
		'choose_from_most_used'      => __( 'Choose from the most used', 'pitchfork-students' ),
		'popular_items'              => __( 'Popular Org Types', 'pitchfork-students' ),
		'search_items'               => __( 'Search Org Types', 'pitchfork-students' ),
		'not_found'                  => __( 'Not Found', 'pitchfork-students' ),
		'no_terms'                   => __( 'No org types', 'pitchfork-students' ),
		'items_list'                 => __( 'Org types list', 'pitchfork-students' ),
		'items_list_navigation'      => __( 'Org types navigation', 'pitchfork-students' ),
	);
	$args = array(
		'labels'                     => $labels,
		'hierarchical'               => true,
		'public'                     => false,
		'show_ui'                    => true,
		'show_admin_column'          => true,
		'show_in_nav_menus'          => true,
		'show_tagcloud'              => false,
		'show_in_rest'               => true,
	);
	register_taxonomy( 'orgtype', array( 'studentorg' ), $args );

}
add_action( 'init', 'pitchfork_students_orgtype_tax', 0 );

