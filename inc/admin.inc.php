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

					<form id="homepage-settings-form">
						<div id="homepage-tabs">
							<div class="group"><h3>A la une</h3>
								<div>
									<ul>
										<?php
										global $wpdb;
										$table_name = $wpdb->base_prefix."mediasphere";
										$results = $wpdb->get_results("SELECT * FROM $table_name;");
										foreach ($results as $result) {
											echo $result->title.'<input type="checkbox" name="featured_choice" value="'.$result->id.'"></li>';
										}
										?>
									</ul>
								</div>
							</div>
							<div class="group"><h3>Categories</h3>
								<div>
								</div>
							</div>
							<div class="group"><h3>Derniers articles</h3>
								<div>
								</div>
							</div>
						</div>
						<button class="button button-primary">Enregistrer</button>
					</form>
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
