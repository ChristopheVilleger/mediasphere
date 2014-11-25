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

	$sql = 'CREATE TABLE IF NOT EXISTS '.$table_name.' (
		`home_widgets_order` varchar(100) NOT NULL,
		`home_featured_posts` varchar(100) NOT NULL,
		`home_categories` varchar(100) NOT NULL
		) ENGINE=InnoDB DEFAULT CHARSET=latin1;';

$sql .="CREATE TABLE IF NOT EXISTS `wp_mediasphere_settings` (
	`id` int(11) NOT NULL,
	`home_widgets_order` varchar(100) NOT NULL,
	`home_last_videos` int(10) NOT NULL,
	`home_socials` text NOT NULL,
	UNIQUE KEY `id` (`id`)
	) ENGINE=InnoDB DEFAULT CHARSET=latin1;";

$sql.="INSERT INTO `wp_mediasphere_settings` (`id`, `home_widgets_order`, `home_last_videos`, `home_socials`) VALUES
(0, '0,1,2,3', 0, '');";


dbDelta( $sql );
}
