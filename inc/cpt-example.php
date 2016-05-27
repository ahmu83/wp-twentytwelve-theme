<?php

/*----------------------------------*/
/* "example" Post Type */
/*----------------------------------*/

class cpt_example {

	function cpt_example() {
		add_action('init',array($this,'create_post_type'));
	}

	function create_post_type() {
		$labels = array(
		    'name' => 'Example',
		    'singular_name' => 'Example',
		    'add_new' => 'Add New',
		    'all_items' => 'All Example',
		    'add_new_item' => 'Add New Example',
		    'edit_item' => 'Edit Example',
		    'new_item' => 'New Example',
		    'view_item' => 'View Example',
		    'search_items' => 'Search Example',
		    'not_found' =>  'No Example found',
		    'not_found_in_trash' => 'No Example found in trash',
		    'parent_item_colon' => 'Parent Example:',
		    'menu_name' => 'Example'
		);
		$args = array(
			'labels' => $labels,
			'description' => "Example Description",
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
			'rewrite' => array('slug' => 'example'),
			'query_var' => true,
			'can_export' => true
		);
		register_post_type('example', $args);

		$cat_labels = array(
			'name' => __( 'Categories', '' ),
			'singular_name' => __( 'Category', '' ),
			'search_items' =>  __( 'Search Categories', '' ),
			'all_items' => __( 'All Categories', '' ),
			'parent_item' => __( 'Parent Category', '' ),
			'parent_item_colon' => __( 'Parent Category:', '' ),
			'edit_item' => __( 'Edit Category', '' ),
			'update_item' => __( 'Update Category', '' ),
			'add_new_item' => __( 'Add New Category', '' ),
			'new_item_name' => __( 'New Category Name', '' ),
			'choose_from_most_used'	=> __( 'Choose from the most used example categories', '' )
		); 	

		register_taxonomy('example_cats','example',array(
			'hierarchical' => true,
			'labels' => $cat_labels,
			'query_var' => true,
			'rewrite' => array( 'slug' => 'example-category' ),
		));


	}

}

$cpt_example = new cpt_example();


