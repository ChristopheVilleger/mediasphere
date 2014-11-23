	<?php
		//Libs
	require_once( get_template_directory() . '/inc/homepage.inc.php' );
	require_once( get_template_directory() . '/inc/cinematheque.inc.php' );
	require_once( get_template_directory() . '/inc/admin.inc.php' );
	require_once( get_template_directory() . '/inc/customTheme.inc.php' );
	require_once( get_template_directory() . '/inc/install.inc.php' );


	global $wpdb;
	$table_name = $wpdb->prefix. "mediasphere";

	//
	//
	//RSS links
	automatic_feed_links();

	wp_deregister_script('jquery');
	wp_register_script('jquery', ("//code.jquery.com/jquery-1.11.0.min.js"), false);
	wp_enqueue_script('jquery');


  function setup_theme_admin_menus() {
    add_submenu_page('themes.php', 
        'cinematheque_elements', 'Paramétrages cinémathèque', 'manage_options', 
        'cinematheque_elements', 'theme_mediasphere_settings');
  }

  function theme_mediasphere_settings() {
    include('form.php');
  }

  // This tells WordPress to call the function named "setup_theme_admin_menus"
  // when it's time to create the menu pages.
  add_action('admin_menu', 'setup_theme_admin_menus');
  add_action('admin_menu', 'createMediaSphereTable');

	add_action('admin_menu', 'ms_theme_menu');
	add_action('wp_enqueue_scripts', 'add_ms_css' );
	add_action('wp_enqueue_scripts', 'add_ms_js' );
	add_action('admin_footer', 'add_ms_js');



	function add_ms_css() {
		wp_register_style( 'prefix-style',  get_template_directory_uri().'/public/css/ms-style.css' );
		wp_register_style( 'font-awesome',  get_template_directory_uri().'/public/css/font-awesome.min.css' );
		wp_enqueue_style( 'prefix-style' );
		wp_enqueue_style( 'font-awesome' );
	}

	function add_ms_js() {
		global $wp_scripts;

		wp_enqueue_script('jquery-ui-core');
		wp_enqueue_script('jquery-ui-tabs');
		wp_enqueue_script('jquery-ui-sortable');
		$queryui = $wp_scripts->query('jquery-ui-core');
		$url = "http://ajax.googleapis.com/ajax/libs/jqueryui/".$queryui->ver."/themes/smoothness/jquery-ui.css";

		wp_enqueue_style('jquery-ui-smoothness', $url, false, null);
		wp_register_script( 'prefix-js', get_template_directory_uri().'/public/js/ms-core.js' );
		wp_enqueue_script( 'prefix-js' );
	}

		// Clean up the <head>
	function removeHeadLinks() {
		remove_action('wp_head', 'rsd_link');
		remove_action('wp_head', 'wlwmanifest_link');
	}
	add_action('init', 'removeHeadLinks');
	remove_action('wp_head', 'wp_generator');

	if (function_exists('register_sidebar')) {
		register_sidebar(array(
			'name' => 'Sidebar Widgets',
			'id'   => 'sidebar-widgets',
			'description'   => 'Widgets pour la sidebar.',
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h2>',
			'after_title'   => '</h2>'
			));
	}

	/**
	*
	* Administration Page of the Theme
	*
	**/

function createMediaSphereTable() {
  global $wpdb;
  // Creating the db
  if ( !defined('ABSPATH') )
    define('ABSPATH', dirname(__FILE__) . '/');

  $table_name = $wpdb->prefix."mediasphere";

  $sql =  "CREATE TABLE IF NOT EXISTS ".$table_name." (
    `id` int(11) NOT NULL,
    `name` int(11),
    `release_date` datetime,
    `category` varchar(36),
    `title` varchar(36),
    `youtube_link` varchar(36),
    UNIQUE KEY `id` (`id`) ); ";

    $wpdb->query($sql); 
}

function getEveryData() {
  global $wpdb;
  $table_name = $wpdb->prefix. "mediasphere";
  $results = $wpdb->get_results("SELECT * FROM ".$table_name.";");
  return $settings;
}

	/*==========  Settings data   ==========*/
	function getMediaSphereSettings(  )
	{
		global $wpdb;
		$table_name = $wpdb->prefix. "mediasphere_settings";
		$results = $wpdb->get_results("SELECT * FROM ".$table_name.";");

		// Selecting only the first table
		$data = $results[0];
		// Setting the variables
		$settings['time_duration'] = $data->time_duration;

		$settings['autoplay'] = $data->autoplay;
		return $settings;
	}

/**
	* Theme Option Page Example
	*/
	function ms_theme_menu()
	{
		add_theme_page( 'MS Settings', 'MS Settings', 'manage_options', 'functions.php', 'mediasphere');
	}
	register_nav_menus( array(	'ms_top_menu' => 'Menu navigation top',) );
