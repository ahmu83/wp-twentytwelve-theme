<?php

/* 
 * reference links
 *
 * http://www.advancedcustomfields.com/resources/query-posts-custom-fields/
 *
 * 
 * 
 */


require get_stylesheet_directory() . '/inc/constants.php';
require THEME_DIRECTORY . '/inc/custom-post-types.php';

function theme_additional_body_classes( $classes ) {
	
	global $post;
	
	if ( isset( $post ) ) $classes[] = $post->post_type . '-' . $post->post_name;
	if ( get_field( 'hide_page_title' ) ) $classes[] = 'hide_page_title';
	if ( get_field( 'body_class_names' ) ) $classes[] = get_field( 'body_class_names' );

	return $classes;

}
add_filter( 'body_class', 'theme_additional_body_classes' );

function theme_widgets_init() {

	register_sidebar( array(
		'name' => 'Header Widgets',
		'id' => 'header-widgets',
		'description' => 'Appears on the header top bar.',
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );

	register_sidebar( array(
		'name' => 'Footer Widgets',
		'id' => 'footer-widgets',
		'description' => 'Appears on the site footer.',
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );

	register_sidebar( array(
		'name' => 'Hidden Widgets',
		'id' => 'hidden-widgets',
		'description' => 'Added to the site, but hidden.',
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );

}
add_action( 'widgets_init', 'theme_widgets_init' );

function theme_enqueue_styles_scripts() {

  wp_enqueue_style( 'theme-custom-styles', THEME_URI . '/css/theme.css' );
  wp_enqueue_style( 'responsive-custom-styles', THEME_URI . '/css/responsive.css' );
  wp_enqueue_style( 'font-awesome-styles', THEME_URI . '/js/font-awesome/css/font-awesome.min.css' );

  wp_enqueue_script( 'theme-custom-scripts', THEME_URI . '/js/theme.js', array('jquery') );

}
add_action( 'wp_enqueue_scripts', 'theme_enqueue_styles_scripts', 60 );

function theme_remove_widget_title( $widget_title ) {
	if ( substr ( $widget_title, 0, 1 ) == '!' )
		return;
	else 
		return ( $widget_title );
}
add_filter( 'widget_title', 'theme_remove_widget_title' );

if( !function_exists('get_dynamic_sidebar') ) {

	function get_dynamic_sidebar( $index = 1, $open_tag = '', $close_tag = '' ) {

		if ( is_active_sidebar( $index ) ) {

			$sidebar_contents = $open_tag . '<div id="' . $index . '">';

			ob_start();

			dynamic_sidebar($index);

			$sidebar_contents .= ob_get_clean();

			$sidebar_contents .= '</div>' . $close_tag;

			return $sidebar_contents;

		}

	}

}


function theme_site_options_toolbar_link( $wp_admin_bar ) {

	$site_options_link = get_edit_post_link( PAGEID_OPTIONS );

	if( current_user_can( 'administrator' ) && $site_options_link ) {

		$args = array(
			'id'    => 'global_site_options',
			'title' => 'Site Options',
			'href'  => $site_options_link,
			'meta'  => array( 'class' => 'site-options-page' )
		);

		$wp_admin_bar->add_node( $args );

	}

}
add_action( 'admin_bar_menu', 'theme_site_options_toolbar_link', 999 );

function get_global_option( $option_name ) {

	return get_field($option_name, PAGEID_OPTIONS);

}

function get_sidebar_func( $atts ) {

	$a = shortcode_atts( array(
		'name' => 1
	), $atts );

	return get_dynamic_sidebar( $a['name'] );

}
add_shortcode( 'get_sidebar', 'get_sidebar_func' );

function disable_wpautop( $content ) {

  global $post;
  
  $disable_autop = get_field('disable_autop', $post->ID);

  if ($disable_autop) {

    remove_filter('the_content', 'wpautop');

  } else {

    add_filter('the_content', 'wpautop');

  }
  
  return $content;

}
add_filter('the_content', 'disable_wpautop', 9);












