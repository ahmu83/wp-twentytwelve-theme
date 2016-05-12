<?php

define( 'SITE_URL', get_site_url() );
define( 'SITE_NAME', get_bloginfo( 'name' ) );
define( 'THEME_DIRECTORY', get_stylesheet_directory() );
define( 'THEME_URI', get_stylesheet_directory_uri() );
define( 'UPLOADS_URI', wp_upload_dir()['baseurl'] );
define( 'UPLOADS_DIR', wp_upload_dir()['basedir'] );

define( 'PAGEID_OPTIONS', 26 );
