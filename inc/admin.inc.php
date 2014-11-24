		<?php
		add_action('admin_head', 'add_ms_css');
		function mediasphere_settings() {
			// CSS

			global $wpdb;
			$table_name = $wpdb->base_prefix."mediasphere";
			$videos = $wpdb->get_results("SELECT * FROM $table_name;");

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
					<li><a href="#tabs-1">Général</a></li>
					<li><a href="#tabs-2">Page d'accueil</a></li>
					<li><a href="#tabs-3">Pages</a></li>
					<li><a href="#tabs-4">Cinémathèque</a></li>
				</ul>
				<div  id="tabs-1">
					<h2>Général</h2>
				</div>
				<div  id="tabs-2">
					<h2>Page d'accueil</h2>
					Vous pouvez choisir la disposition des différents éléments sur la page d'accueil. Modifier l'ordre, activer ou
					désactiver certains modules.
					<section id="ms_widgets_admin" >
						<div>
							Activés<br>
							<select id="leftValues" size="5" multiple></select>
						</div>
						<input type="button" id="btnLeft" value="&lt;&lt;" />
						<input type="button" id="btnRight" value="&gt;&gt;" />
						<div>
							Désactivés<br>
							<select id="rightValues" size="4" multiple>
								<option>A la une</option>
								<option>A la une</option>
								<option>A la une</option>
								<option>A la une</option>
							</select>
						</div>
					</section>
				</div>
				<div  id="tabs-3">
					<h2>Pages</h2>
					Vous pouvez choisir la disposition des différents éléments sur la page d'accueil. Modifier l'ordre, activer ou
					désactiver certains modules.
				</div>
				<div  id="tabs-4">
					<h2>Cinémathèque</h2>
					Vous trouverez ici les différents paramètres vous permettant de régler vos cinémathèques.
				</div>
			</div>

			<?php
		}

		?>
	</div>
