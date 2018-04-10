<?php

/**
 * Registers the `project` post type.
 */
function project_init() {
	register_post_type( 'project', array(
		'labels'                => array(
			'name'                  => __( 'Projects', 'wp-c4tb' ),
			'singular_name'         => __( 'Project', 'wp-c4tb' ),
			'all_items'             => __( 'All Projects', 'wp-c4tb' ),
			'archives'              => __( 'Project Archives', 'wp-c4tb' ),
			'attributes'            => __( 'Project Attributes', 'wp-c4tb' ),
			'insert_into_item'      => __( 'Insert into Project', 'wp-c4tb' ),
			'uploaded_to_this_item' => __( 'Uploaded to this Project', 'wp-c4tb' ),
			'featured_image'        => _x( 'Featured Image', 'project', 'wp-c4tb' ),
			'set_featured_image'    => _x( 'Set featured image', 'project', 'wp-c4tb' ),
			'remove_featured_image' => _x( 'Remove featured image', 'project', 'wp-c4tb' ),
			'use_featured_image'    => _x( 'Use as featured image', 'project', 'wp-c4tb' ),
			'filter_items_list'     => __( 'Filter Projects list', 'wp-c4tb' ),
			'items_list_navigation' => __( 'Projects list navigation', 'wp-c4tb' ),
			'items_list'            => __( 'Projects list', 'wp-c4tb' ),
			'new_item'              => __( 'New Project', 'wp-c4tb' ),
			'add_new'               => __( 'Add New', 'wp-c4tb' ),
			'add_new_item'          => __( 'Add New Project', 'wp-c4tb' ),
			'edit_item'             => __( 'Edit Project', 'wp-c4tb' ),
			'view_item'             => __( 'View Project', 'wp-c4tb' ),
			'view_items'            => __( 'View Projects', 'wp-c4tb' ),
			'search_items'          => __( 'Search Projects', 'wp-c4tb' ),
			'not_found'             => __( 'No Projects found', 'wp-c4tb' ),
			'not_found_in_trash'    => __( 'No Projects found in trash', 'wp-c4tb' ),
			'parent_item_colon'     => __( 'Parent Project:', 'wp-c4tb' ),
			'menu_name'             => __( 'Projects', 'wp-c4tb' ),
		),
		'public'                => true,
		'hierarchical'          => false,
		'show_ui'               => true,
		'show_in_nav_menus'     => true,
		'supports'              => array( 'title', 'editor' ),
		'has_archive'           => true,
		'rewrite'               => true,
		'query_var'             => true,
		'menu_icon'             => 'dashicons-admin-post',
		'show_in_rest'          => true,
		'rest_base'             => 'project',
		'rest_controller_class' => 'WP_REST_Posts_Controller',
	) );

}
add_action( 'init', 'project_init' );

/**
 * Sets the post updated messages for the `project` post type.
 *
 * @param  array $messages Post updated messages.
 * @return array Messages for the `project` post type.
 */
function project_updated_messages( $messages ) {
	global $post;

	$permalink = get_permalink( $post );

	$messages['project'] = array(
		0  => '', // Unused. Messages start at index 1.
		/* translators: %s: post permalink */
		1  => sprintf( __( 'Project updated. <a target="_blank" href="%s">View Project</a>', 'wp-c4tb' ), esc_url( $permalink ) ),
		2  => __( 'Custom field updated.', 'wp-c4tb' ),
		3  => __( 'Custom field deleted.', 'wp-c4tb' ),
		4  => __( 'Project updated.', 'wp-c4tb' ),
		/* translators: %s: date and time of the revision */
		5  => isset( $_GET['revision'] ) ? sprintf( __( 'Project restored to revision from %s', 'wp-c4tb' ), wp_post_revision_title( (int) $_GET['revision'], false ) ) : false,
		/* translators: %s: post permalink */
		6  => sprintf( __( 'Project published. <a href="%s">View Project</a>', 'wp-c4tb' ), esc_url( $permalink ) ),
		7  => __( 'Project saved.', 'wp-c4tb' ),
		/* translators: %s: post permalink */
		8  => sprintf( __( 'Project submitted. <a target="_blank" href="%s">Preview Project</a>', 'wp-c4tb' ), esc_url( add_query_arg( 'preview', 'true', $permalink ) ) ),
		/* translators: 1: Publish box date format, see https://secure.php.net/date 2: Post permalink */
		9  => sprintf( __( 'Project scheduled for: <strong>%1$s</strong>. <a target="_blank" href="%2$s">Preview Project</a>', 'wp-c4tb' ),
		date_i18n( __( 'M j, Y @ G:i' ), strtotime( $post->post_date ) ), esc_url( $permalink ) ),
		/* translators: %s: post permalink */
		10 => sprintf( __( 'Project draft updated. <a target="_blank" href="%s">Preview Project</a>', 'wp-c4tb' ), esc_url( add_query_arg( 'preview', 'true', $permalink ) ) ),
	);

	return $messages;
}
add_filter( 'post_updated_messages', 'project_updated_messages' );
