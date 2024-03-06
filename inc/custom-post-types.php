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
		'attributes'            => __( 'Org attributes', 'pitchfork-students' ),
		'parent_item_colon'     => __( 'Parent Org:', 'pitchfork-students' ),
		'all_items'             => __( 'All Orgs', 'pitchfork-students' ),
		'add_new_item'          => __( 'Add New Org', 'pitchfork-students' ),
		'add_new'               => __( 'Add New', 'pitchfork-students' ),
		'new_item'              => __( 'New Org', 'pitchfork-students' ),
		'edit_item'             => __( 'Edit Org', 'pitchfork-students' ),
		'update_item'           => __( 'Update Org', 'pitchfork-students' ),
		'view_item'             => __( 'View Org', 'pitchfork-students' ),
		'view_items'            => __( 'View Orgs', 'pitchfork-students' ),
		'search_items'          => __( 'Search Org', 'pitchfork-students' ),
		'not_found'             => __( 'Not found', 'pitchfork-students' ),
		'not_found_in_trash'    => __( 'Not found in Trash', 'pitchfork-students' ),
		'featured_image'        => __( 'Featured Image', 'pitchfork-students' ),
		'set_featured_image'    => __( 'Set featured image', 'pitchfork-students' ),
		'remove_featured_image' => __( 'Remove featured image', 'pitchfork-students' ),
		'use_featured_image'    => __( 'Use as featured image', 'pitchfork-students' ),
		'insert_into_item'      => __( 'Insert into Org', 'pitchfork-students' ),
		'uploaded_to_this_item' => __( 'Uploaded to this org', 'pitchfork-students' ),
		'items_list'            => __( 'Orgs list', 'pitchfork-students' ),
		'items_list_navigation' => __( 'Orgs list navigation', 'pitchfork-students' ),
		'filter_items_list'     => __( 'Filter orgs list', 'pitchfork-students' ),
	);
	$args = array(
		'label'                 => __( 'Student Org', 'pitchfork-students' ),
		'description'           => __( 'A student organization', 'pitchfork-students' ),
		'labels'                => $labels,
		'supports'              => array( 'title', 'editor', 'thumbnail', 'revisions' ),
		'taxonomies'            => array( 'category' ),
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
