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
	add_action('after_setup_theme', 'createMediaSphereTable');
	add_action('after_setup_theme', 'createMediaSphereSettingsTable');

	add_action('admin_menu', 'ms_theme_menu');
	add_action('wp_enqueue_scripts', 'add_ms_css' );
	add_action('wp_enqueue_scripts', 'add_ms_js' );
	add_action('admin_footer', 'add_ms_js');



	function add_ms_css() {
		wp_register_style( 'prefix-style',  get_template_directory_uri().'/public/css/ms-style.css' );
		wp_register_style( 'font-awesome',  get_template_directory_uri().'/public/css/font-awesome.min.css' );
		wp_register_style( 'widget_mediaphere',  get_template_directory_uri().'/public/css/widget_mediaphere.css' );
		wp_enqueue_style( 'prefix-style' );
		wp_enqueue_style( 'font-awesome' );
		wp_enqueue_style( 'widget_mediaphere' );
	}

	function add_ms_js() {
		global $wp_scripts;

		//wp_enqueue_script('jquery-ui-core');
		//wp_enqueue_script('jquery-ui-tabs');
		//wp_enqueue_script('jquery-ui-sortable');
		//wp_enqueue_script('jquery-ui-accordion');
		$queryui = $wp_scripts->query('jquery-ui-core');
		$url = "http://ajax.googleapis.com/ajax/libs/jqueryui/".$queryui->ver."/themes/smoothness/jquery-ui.css";

		wp_enqueue_style('jquery-ui-smoothness', $url, false, null);

		wp_register_script( 'prefix-js', get_template_directory_uri().'/public/js/ms-core.js' );
		wp_deregister_script('jquery-ui');
		wp_register_script('jquery-ui', ("//ajax.googleapis.com/ajax/libs/jqueryui/1.11.2/jquery-ui.min.js"), false);
		wp_enqueue_script('jquery-ui');
		wp_register_script( 'mediasphere_cinematheque-js', get_template_directory_uri().'/public/js/mediasphere_cinematheque.js' );
		wp_enqueue_script( 'prefix-js' );
		wp_enqueue_script( 'mediasphere_cinematheque-js' );
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
		include('helpers/get_elements.php');


		$sql_results = $wpdb->get_results("SELECT `COLUMN_NAME` FROM `INFORMATION_SCHEMA`.`COLUMNS`  WHERE `TABLE_NAME`='wp_mediasphere';", ARRAY_N);

		$results = array();

		foreach ($sql_results as $key => $value) {
			if ($value[0] != 'id') {
				$results[] = $value[0];
			}
		}
		$diff = array_diff(array_keys($elements), $results);

	// If the columns in the DB and the var in get_elements are not the same
		if (count($diff) > 0  ) {
			$wpdb->query("DROP TABLE wp_mediasphere;");
		}

		$sql =  "CREATE TABLE IF NOT EXISTS ".$table_name." (`id` int(11) NOT NULL AUTO_INCREMENT,";

			foreach ($elements as $name => $type) {

		// Set $sql_type
				switch ($type) {
					case 'text':
					$sql_type = 'varchar(72)';
					break;
					case 'number':
					$sql_type = 'int(11)';
					break;
					case 'date':
					$sql_type = 'datetime';
					break;
					default:
					$sql_type = $type;
				}

				$sql = $sql."`$name` ".$sql_type.",";
			}

			$sql = $sql." UNIQUE KEY `id` (`id`) ); ";

	$wpdb->query($sql);

	$insertSql = "INSERT INTO `wp_mediasphere` (`id`, `title`, `release_date`, `category`, `youtube_link`) VALUES
	(3, 'Guild wars test', '1991-12-20 00:00:00', 'Guild Wars', 'https://www.youtube.com/watch?v=mvu5n31lwSo'),
	(4, 'Guild wars 2 mois aprÃ¨s', '1991-12-20 00:00:00', 'Guild Wars', 'https://www.youtube.com/watch?v=HkKceoHPEcU'),
	(5, 'Guild wars 2 review', '1991-12-20 00:00:00', 'Guild Wars', 'https://www.youtube.com/watch?v=Ax-_06Acj8Y'),
	(6, 'Guild wars is Dying', '1991-12-20 00:00:00', 'Guild Wars', 'https://www.youtube.com/watch?v=xHt8JrDQeuM'),
	(7, 'Guild wars truc & astuce', '1998-07-12 00:00:00', 'Guild Wars', 'https://www.youtube.com/watch?v=LtbaqDyShbw'),
	(8, 'Guild Wars 2 - PC Preview Gameplay ', '1998-07-12 00:00:00', 'Guild Wars', 'https://www.youtube.com/watch?v=kVdihizq4XE');";
	$wpdb->query($insertSql);
}

function createMediaSphereSettingsTable() {
		global $wpdb;
  // Creating the db
		if ( !defined('ABSPATH') )
			define('ABSPATH', dirname(__FILE__) . '/');

		$table_name = $wpdb->prefix."mediasphere_settings";


	$sql = "CREATE TABLE IF NOT EXISTS ".$table_name." (
		  `id` int(11) NOT NULL,
		  `home_widgets_order` varchar(100) NOT NULL,
		  `home_last_videos` int(10) NOT NULL,
		  `home_socials` text NOT NULL,
		  `nb_videos` int(10) NOT NULL,
		  UNIQUE KEY `id` (`id`)
		) ENGINE=InnoDB DEFAULT CHARSET=latin1;";

	$wpdb->query($sql);
	$sql ="INSERT INTO ".$table_name." (`id`, `home_widgets_order`, `home_last_videos`, `home_socials`, `nb_videos`) VALUES
(0, '\"0,1,2,3,4\"', 0, '{\"fb\":{\"link\":\"\",\"text\":\"\"},\"tw\":{\"link\":\"\",\"text\":\"\"},\"ln\":{\"link\":\"\",\"text\":\"\"},\"pi\":{\"link\":\"\",\"text\":\"\"},\"gg\":{\"link\":\"\",\"text\":\"\"},\"yt\":{\"link\":\"\",\"text\":\"\"}}', '4');";
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
		add_theme_page( 'MS Settings', 'MS Settings', 'manage_options', 'functions.php', 'mediasphere_settings');
	}
	register_nav_menus( array(	'ms_top_menu' => 'Menu navigation top',) );

	function cinematheque( ){
		return ms_cinematheque();
	}
	add_shortcode( 'ms_cinematheque', 'cinematheque' );
