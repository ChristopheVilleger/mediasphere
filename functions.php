	<?php
		//Libs
	require_once( get_template_directory() . '/inc/homepage.inc.php' );
	require_once( get_template_directory() . '/inc/cinematheque.inc.php' );
	require_once( get_template_directory() . '/inc/admin.inc.php' );
	require_once( get_template_directory() . '/inc/customTheme.inc.php' );
<<<<<<< HEAD
	require_once( get_template_directory() . '/inc/install.inc.php' );
=======
>>>>>>> origin/master


	global $wpdb;
	$table_name = $wpdb->prefix. "mediasphere_settings";

	//
	//
	//RSS links
	automatic_feed_links();

	wp_deregister_script('jquery');
	wp_register_script('jquery', ("//code.jquery.com/jquery-1.11.0.min.js"), false);
	wp_enqueue_script('jquery');


	add_action(	'admin_menu', 'ms_theme_menu');
	add_action( 'wp_enqueue_scripts', 'add_ms_css' );
	add_action( 'wp_enqueue_scripts', 'add_ms_js' );
	add_action( 'admin_footer', 'add_ms_js');



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
	* Page d'administration du theme
	*
	**/

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
		add_theme_page( 'MS Settings', 'MS Settings', 'manage_options', 'functions.php', 'mediasphere_settings');
	}
<<<<<<< HEAD
	register_nav_menus( array(	'ms_top_menu' => 'Menu navigation top',) );
=======


	?>
>>>>>>> origin/master
