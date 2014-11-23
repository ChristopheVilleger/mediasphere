	<?php

	function mediasphere_settings() {

		// CSS
		add_ms_css();

		if ( !current_user_can( 'manage_options' ) )  {
			wp_die( __( 'You do not have sufficient permissions to access this page.' ) );
		}

		global $wpdb;
		//$settings = getSettings();
		$table_name = $wpdb->prefix. "mediasphere_settings";

		if ( isset ( $_POST ) && !empty($_POST)) {
			//UPDATE de la config
		}
		?>

		<h1>Paramètres du thème MediaSphere</h1>

		<!-- Homepage settings -->
		<div id="ms_admin_tabs">
			<ul>
<<<<<<< HEAD
				<li><a href="#tabs-1">Général</a></li>
				<li><a href="#tabs-2">Page d'accueil</a></li>
				<li><a href="#tabs-3">Pages</a></li>
				<li><a href="#tabs-4">Cinémathèque</a></li>
			</ul>
			<div  id="tabs-1">
				<h2>Général</h2>

				<h3>Menu</h3>

			</div>
			<div  id="tabs-2">
=======
				<li><a href="#tabs-1">Page d'accueil</a></li>
				<li><a href="#tabs-2">Pages</a></li>
				<li><a href="#tabs-3">Cinémathèque</a></li>
			</ul>
			<div  id="tabs-1">
>>>>>>> origin/master
				<h2>Page d'accueil</h2>
				Vous pouvez choisir la disposition des différents éléments sur la page d'accueil. Modifier l'ordre, activer ou
				désactiver certains modules.

				<div id="hompage-tabs">
					<div  id="homepage-tabs-1">
					</div>
					<div  id="homepage-tabs-2">
					</div>
					<div  id="homepage-tabs-3">
					</div>
				</div>
			</div>
			<div  id="tabs-2">
				<h2>Pages</h2>
				Vous pouvez choisir la disposition des différents éléments sur la page d'accueil. Modifier l'ordre, activer ou
				désactiver certains modules.

			</div>
			<div  id="tabs-3">
				<h2>Cinémathèque</h2>
				Vous trouverez ici les différents paramètres vous permettant de régler vos cinémathèques.
			</div>
		</div>

		<?php
	}

	?>
</div>
