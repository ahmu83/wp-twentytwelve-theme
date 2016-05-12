<?php
/**
 * The Header template for our theme
 *
 * Displays all of the <head> section and everything up till <div id="main">
 *
 * @package WordPress
 * @subpackage Twenty_Twelve
 * @since Twenty Twelve 1.0
 */
?><!DOCTYPE html>
<!--[if IE 7]>
<html class="ie ie7" <?php language_attributes(); ?>>
<![endif]-->
<!--[if IE 8]>
<html class="ie ie8" <?php language_attributes(); ?>>
<![endif]-->
<!--[if !(IE 7) & !(IE 8)]><!-->
<html <?php language_attributes(); ?>>
<!--<![endif]-->
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<meta name="viewport" content="width=device-width" />
<title><?php wp_title( '|', true, 'right' ); ?></title>
<link rel="profile" href="http://gmpg.org/xfn/11" />
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
<?php // Loads HTML5 JavaScript file to add support for HTML5 elements in older IE versions. ?>
<!--[if lt IE 9]>
<script src="<?php echo get_template_directory_uri(); ?>/js/html5.js" type="text/javascript"></script>
<![endif]-->
<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="hfeed site">
	<header id="masthead" class="site-header" role="banner">
		<div class="container">
			<div class="site-name">
				<?php if( $site_logo = wp_get_attachment_url(get_global_option('site_logo')) ) : ?>
					<a class="logo" href="<?php echo SITE_URL; ?>" title="<?php echo SITE_NAME; ?>" rel="home">
						<img src="<?php echo $site_logo; ?>" alt="site logo">
					</a>
				<?php else: ?>
					<h1 class="site-title">
						<a href="<?php echo SITE_URL; ?>" title="<?php echo SITE_NAME; ?>" rel="home"><?php echo SITE_NAME; ?></a>
					</h1>
					<h2 class="site-description"><?php bloginfo('description'); ?></h2>
				<?php endif; ?>
			</div>
			<div class="site-navigation">
				<nav id="site-navigation" class="main-navigation" role="navigation">
					<button class="menu-toggle"><?php _e( 'Menu', 'twentytwelve' ); ?></button>
					<a class="assistive-text" href="#content" title="<?php esc_attr_e( 'Skip to content', 'twentytwelve' ); ?>"><?php _e( 'Skip to content', 'twentytwelve' ); ?></a>
					<?php wp_nav_menu( array( 'theme_location' => 'primary', 'menu_class' => 'nav-menu' ) ); ?>
				</nav><!-- #site-navigation -->
			</div>
		</div>
		<?php if( $header_image = wp_get_attachment_url(get_field('header_image')) ) : ?>
			<div class="header-image">
				<img src="<?php echo $header_image; ?>" alt="header image" width="100%">
			</div>
		<?php endif; ?>
	</header><!-- #masthead -->

	<div id="main" class="wrapper">
		<div class="container">