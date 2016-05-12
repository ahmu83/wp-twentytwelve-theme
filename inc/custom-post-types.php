<?php

/*----------------------------------*/
/* "example" Post Type */
/*----------------------------------*/

class example_post {

	function example_post() {
		add_action('init',array($this,'create_post_type'));
	}

	function create_post_type() {
		$labels = array(
		    'name' => 'Example Posts',
		    'singular_name' => 'Example Post',
		    'add_new' => 'Add New',
		    'all_items' => 'All Example Posts',
		    'add_new_item' => 'Add New Example Post',
		    'edit_item' => 'Edit Example Post',
		    'new_item' => 'New Example Post',
		    'view_item' => 'View Example Post',
		    'search_items' => 'Search Example Post',
		    'not_found' =>  'No Example Post found',
		    'not_found_in_trash' => 'No Example Post found in trash',
		    'parent_item_colon' => 'Parent Example Post:',
		    'menu_name' => 'Example Posts'
		);
		$args = array(
			'labels' => $labels,
			'description' => "Example Posts Description",
			'public' => true,
			'exclude_from_search' => true,
			'publicly_queryable' => true,
			'show_ui' => true,
			'show_in_nav_menus' => true,
			'show_in_menu' => true,
			'show_in_admin_bar' => true,
			'menu_position' => 20,
			'menu_icon' => null,
			'capability_type' => 'post',
			'hierarchical' => true,
			'supports' => array('title','editor','author','thumbnail','excerpt','trackbacks','custom-fields','comments','revisions'),
			'has_archive' => true,
			// 'rewrite' => false,
			'rewrite' => array('slug' => 'example-posts'),
			'query_var' => true,
			'can_export' => true
		);
		register_post_type('examplepost',$args);
	}

}

// $example_post = new example_post();


