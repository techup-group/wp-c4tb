<?php

add_action( 'cmb2_admin_init', 'c4tb_register_project_metaboxes' );
/**
 * Define the metabox and field configurations.
 */
function c4tb_register_project_metaboxes() {

	// Start with an underscore to hide fields from custom fields list
	$prefix = '_c4tb_';

	/**
	 * Initiate the metabox
	 */
	$cmb = new_cmb2_box( array(
		'id'            => 'project_metabox',
		'title'         => __( 'Project Details', 'c4tb' ),
		'object_types'  => array( 'project', ), // Post type
		'context'       => 'normal',
		'priority'      => 'high',
		'show_names'    => true, // Show field names on the left
	) );
	// Project URL text field.
	$cmb->add_field( array(
		'name' => __( 'TypeL', 'c4tb' ),
		'desc' => __( 'Is it a website, an app, or?', 'c4tb' ),
		'id'   => $prefix . 'project_type',
		'type' => 'text',
	) );
	// Project URL text field.
	$cmb->add_field( array(
		'name' => __( 'Project URL', 'c4tb' ),
		'desc' => __( 'Public url for project', 'c4tb' ),
		'id'   => $prefix . 'project_url',
		'type' => 'text_url',
	) );
	// GitHub URL text field.
	$cmb->add_field( array(
		'name' => __( 'GitHub URL', 'c4tb' ),
		'desc' => __( 'The full GitHub repository url', 'c4tb' ),
		'id'   => $prefix . 'gh_url',
		'type' => 'text_url',
	) );
	// Repo tags field.
	$cmb->add_field( array(
		'name' => __( 'Project Tags', 'textdomain' ),
		'desc' => __( 'repository keywords', 'textdomain' ),
		'id'   => $prefix . 'repo_tags',
		'type' => 'tags',
	) );

}