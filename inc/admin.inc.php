	<?php
	add_action('admin_head', 'add_ms_css');

	function mediasphere_settings() {

		global $wpdb;


		// CSS
		if ( !current_user_can( 'manage_options' ) )  {
			wp_die( __( 'You do not have sufficient permissions to access this page.' ) );
		}

		$table_videos = $wpdb->base_prefix."mediasphere";
		$table_settings = $wpdb->base_prefix."mediasphere_settings";


				//UPDATE de la config
		if ( isset ( $_POST ) && !empty($_POST)){

			if ( $_POST['action'] == 'update_homepage_order'  ) {
				$data = json_encode($_POST['values']);
				$sql = "UPDATE $table_settings SET home_widgets_order = '$data';";
				$wpdb->query($sql);
			}

			elseif ( $_POST['action'] == 'update_social_networks'  ) {

				$socials = array('fb', 'tw', 'ln', 'pi', 'gg', 'yt');
				$datas = array();
				foreach ($socials as $value) {
					if( isset($_POST[$value.'_link']) && isset($_POST[$value.'_text']))
						$datas[$value] = array(
							'link'=> mysql_real_escape_string($_POST[$value.'_link']),
							'text' => mysql_real_escape_string($_POST[$value.'_text'])
							);
				}
				$data = json_encode($datas);
				$sql = "UPDATE $table_settings SET home_socials = '$data';";
				$wpdb->query($sql);
			}

		}

		$videos = $wpdb->get_results("SELECT * FROM $table_videos;");
		$settingss = $wpdb->get_results("SELECT * FROM $table_settings;");
		$settings = $settingss[0];

		$widgets_active = array();
		$widgets_disable = array(0,1,2,3,4);

		$homepage_sections = array(
			'Dernières vidéos',
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

		$socialsDatas = json_decode($settings->home_socials);
		$links = array('fb' => '', 'tw'=> '', 'ln'=> '', 'pi'=> '', 'gg'=> '', 'yt'=> '');
		$texts = array('fb' => '', 'tw'=> '', 'ln'=> '', 'pi'=> '', 'gg'=> '', 'yt'=> '');

		foreach ($socialsDatas as $key => $value) {
			$links[$key] = $value->link;
			$texts[$key] = $value->text;
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
				<?php
					if ( isset ( $_POST['nb_videos'] ) && !empty($_POST['nb_videos'])) {
						$table_name = $wpdb->prefix. "mediasphere";
						$sql = "UPDATE  `wordpress`.`wp_mediasphere_settings` SET  `nb_videos` =  '".$_POST['nb_videos']."' WHERE  `wp_mediasphere_settings`.`id` =0;" ;
						$wpdb->query($sql);
						echo "<h2 style='color: red'>Merci d'avoir mis à jour le nombre de vidéo par page à ".$_POST['nb_videos']."</h2>
						<br />";
					}
				?>
				<h3>Réseaux sociaux</h3>
				<form method="post" action="" id="update_social">
					<input type="hidden" name="action" value="update_social_networks">
					<div>
						<div class="ms_form_section">
							<b class="fa fa-facebook"></b> <span>Facebook</span><br>
							<label>Lien vers Facebook</label>
							<input type="url" name="fb_link" value="<?php echo $links['fb']; ?>">
							<label>Label ( ex: rejoins nous sur Facebook)</label>
							<input type="text" name="fb_text" value="<?php echo $texts['fb']; ?>">
						</div>

						<div class="ms_form_section">
							<b class="fa fa-twitter"></b><span> Twitter</span><br>
							<label>Lien vers twitter</label>
							<input type="url" name="tw_link" value="<?php echo $links['tw']; ?>">
							<label>Label ( ex: Suivez nous sur Twitter)</label>
							<input type="text" name="tw_text" value="<?php echo $texts['tw']; ?>">
						</div>

						<div class="ms_form_section">
							<b class="fa fa-linkedin"></b> <span>Linkedin</span><br>
							<label>Lien vers Linkedin</label>
							<input type="url" name="ln_link" value="<?php echo $links['li']; ?>">
							<label>Label ( ex: Je suis sur Linkedin)</label>
							<input type="text" name="ln_text" value="<?php echo $texts['li']; ?>">
						</div>

						<div class="ms_form_section">
							<b class="fa fa-pinterest"></b> <span>Pinterest</span><br>
							<label>Lien vers Pinterest</label>
							<input type="url" name="pi_link" value="<?php echo $links['pi']; ?>">
							<label>Label ( ex: Pinterest me)</label>
							<input type="text" name="pi_text" value="<?php echo $texts['pi']; ?>">
						</div>

						<div class="ms_form_section">
							<b class="fa fa-youtube"></b> <span>Youtube</span><br>
							<label>Lien vers Youtube</label>
							<input type="url" name="yt_link" value="<?php echo $links['yt']; ?>">
							<label>Label ( ex: Abonne toi à ma chaine)</label>
							<input type="text" name="yt_text" value="<?php echo $texts['yt']; ?>">
						</div>

						<div class="ms_form_section">
							<b class="fa fa-google-plus"></b> <span>Google plus</span><br>
							<label>Lien vers Google Plus</label>
							<input type="url" name="gg_link" value="<?php echo $links['gg']; ?>">
							<label>Label ( ex: Je suis sur Google Plus)</label>
							<input type="text" name="gg_text" value="<?php echo $texts['gg']; ?>">
						</div>
					</div>
					<button class="button button-primary">Enregistrer</button>
				</form>
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
				Vous trouverez ici les différents paramètres vous permettant de régler votre cinémathèque.

				Nombre de videos affichées:

				<form method="post" action="">
					<?php
						$sql = 'SELECT nb_videos from wp_mediasphere_settings' ;
						$result = $wpdb->get_results($sql, ARRAY_N);
					?>
					<input size='30' type='int' name='nb_videos' value="<?php echo $result[0][0]; ?>">
					<input type="submit" value="Envoyer" />
				</form> 
			</div>
		</div>

		<?php
	}

	?>
</div>