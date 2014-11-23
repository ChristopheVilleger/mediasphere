<?php

register_activation_hook( __FILE__, 'ms_install' );
register_activation_hook( __FILE__, 'ms_install_data' );

function ms_install ()
{
	global $wpdb;
	// Creating the db
	if ( !defined('ABSPATH') )
		define('ABSPATH', dirname(__FILE__) . '/');

	$table_name = $wpdb->prefix. "mediasphere_settings";

	require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );

	$sql = 	'CREATE TABLE IF NOT EXISTS '.$table_name.' (
		`home_widgets_order` varchar(100) NOT NULL,
		`home_featured_posts` varchar(100) NOT NULL,
		`home_categories` varchar(100) NOT NULL
		) ENGINE=InnoDB DEFAULT CHARSET=latin1;';
dbDelta( $sql );
}

function ms_install_data()
{
	global $wpdb;
	$table_name = $wpdb->prefix. "mediasphere_settings";
//$rows_affected = $wpdb->insert( $table_name, array( 'time_duration' => '250', 'effect_name' => 'fade', 'theme_name' => 'light', 'article_number' => 3 , 'slider_width' => 600 , 'slider_height' => 200, 'navigation_menu' => 1, 'autoplay' => 1  ) );
}