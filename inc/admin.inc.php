		<?php
		add_action('admin_head', 'add_ms_css');
		function mediasphere_settings() {
			// CSS
			if ( !current_user_can( 'manage_options' ) )  {
				wp_die( __( 'You do not have sufficient permissions to access this page.' ) );
			}

			global $wpdb;
			$table_videos = $wpdb->base_prefix."mediasphere";
			$table_settings = $wpdb->base_prefix."mediasphere_settings";


			//UPDATE de la config
			if ( isset ( $_POST ) && !empty($_POST)){

				if ( $_POST['action'] == 'update_homepage_order'  ) {
					$data = json_encode($_POST['values']);
					$sql = "UPDATE $table_settings SET home_widgets_order = '$data';";
					$wpdb->query($sql);
				}

			}

			$videos = $wpdb->get_results("SELECT * FROM $table_videos;");
			$settingss = $wpdb->get_results("SELECT * FROM $table_settings;");
			$settings = $settingss[0];

			$widgets_active = array();
			$widgets_disable = array(0,1,2,3,4);

			$homepage_sections = array(
				'A la une',
				'Catégories',
				'Derniers articles',
				'Réseaux sociaux',
				'Barre de recherche'
				);

			$widgets_active = split(',', str_replace('"', "", $settings->home_widgets_order));
			// Tableaux de widgets activés ou non

			if( !empty($widgets_active )){
				foreach ($widgets_active as $key => $value)
					unset($widgets_disable[$value]);
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
						<form method="post" action="" id="update_homepage_order">
							<input type="hidden" name="action" value="update_homepage_order">
							<input type="hidden" id="values" name="values" value="">
							<div>
								Activés<br>
								<select id="leftValues" name="widgets_active[]" size="6" multiple>
									<?php
									foreach ($widgets_active as $value)
										echo 	'<option value="'.$value.'"">'.$homepage_sections[$value].'</option>';
									?>
								</select>
							</div>
							<input type="button" id="btnLeft" value="&lt;&lt;" />
							<input type="button" id="btnRight" value="&gt;&gt;" />
							<div>
								Désactivés<br>
								<select id="rightValues" size="5" multiple>
									<?php
									foreach ($widgets_disable as $value)
										echo 	'<option value="'.$value.'"">'.$homepage_sections[$value].'</option>';
									?>
								</select>
							</div>
							<button>Enregistrer</button>
						</form>
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
