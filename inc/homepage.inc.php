<?php
/**
 * Homepage functions.
 *
 * @package MediaSphere
 */

function ms_homepage() {
	global $wpdb;

	$table_name = $wpdb->prefix. "mediasphere";
	$table_videos = $wpdb->base_prefix."mediasphere";
	$table_settings = $wpdb->base_prefix."mediasphere_settings";
	$settingss = $wpdb->get_results("SELECT * FROM $table_settings;");
	$settings = $settingss[0];

	$widgets_active = split(',', str_replace('"', "", $settings->home_widgets_order));

	$functions = array (
		'ms_featured',
		'ms_categories',
		'ms_last_articles',
		'ms_social_network',
		'ms_search'
		);

	echo ms_top_menu();

	echo '<div class="ms_homepage">';
	// Affichage des zones
	foreach ($widgets_active as $value) {
		if(is_callable($functions[$value], false, $callable_name))
			echo $callable_name();
	}
	echo '</div>';
	//echo ms_sidebar();

}

/**
*
* Menu top
*
* Show top menu
*
**/
function ms_top_menu( ) {
	echo'<!-- Head Menu  -->';

	echo'<!-- END Head Menu  -->';
}

function ms_featured( ) {

	echo'<!-- Featured  -->';
	?>
	<section id="ms_featured">
		<h2 class="ms_title">Dernières vidéos</h2>
		<div class="clear"  id="cinematheque_thumbnails">
			<?php
			global $wpdb;
			$results = $wpdb->get_results("SELECT * FROM ".$wpdb->prefix. "mediasphere");
			$medias_array = array();
			foreach($results as $media_object){
			//echo $media_object->title ;
			//echo $media_object->release_date ;
			//echo $media_object->category ;
				$youtube_link = $media_object->youtube_link;
				$value = substr($youtube_link, -11);
				echo '<div class="ms_featured_section ">';
				echo '';
				echo '<figure>';
				echo '<img src="http://img.youtube.com/vi/' . $value .'/mqdefault.jpg" alt="">';
				echo '<figcaption>'.$media_object->title.'  <span data-value="'.$value.'" class="show_yt fa fa-3x fa-eye"></span></figcaption>';
				echo '</figure>';
				echo '</div>';
			}

			?>
		</div>

		<div id="youtube_dialog">
		</div>
	</div>
</div>
</section>
<?php
echo '<!-- Featured  -->';
}


function ms_categories( ) {

	echo'<!-- Categories  -->';
	?>
	<section id="ms_categories">
		<h2 class="ms_title">Catégories</h2>
		<div class="clear">
                    <?php
                        foreach(get_categories() as $cat) { 
                            echo "<a href='?cat=$cat->cat_ID' title='' class='redBG'>$cat->cat_name</a>" ;
                        }
                    ?> 
		</div>
	</section>

	<?php
	echo'<!-- END Categories  -->';
}

function ms_sidebar( ) {
	echo'<!-- Sidebar  -->';
	include_once TEMPLATEPATH . '/sidebar.php';
	echo'<!-- END Sidebar  -->';
}


function ms_search( ) {
	echo'<!-- Search  -->';
	?>
	<section id="ms_search">
		<h2 class="ms_title">Recherche</h2>
		<div class="clear">
		</div>
	</section>
	<?php
	echo'<!-- END Search  -->';

}

function ms_social_network( ) {
	echo'<!-- Social  -->';
	global $wpdb;
	$table_settings = $wpdb->base_prefix."mediasphere_settings";
	$settingss = $wpdb->get_results("SELECT * FROM $table_settings;");
	$settings = $settingss[0];

	$fa = array('fb'=> 'facebook','tw'=> 'twitter','gg'=>'google-plus','ln'=>'linkedin','yt'=>'youtube','pi'=>'pinterest')
	?>
	<section id="ms_socials">
		<h2 class="ms_title">Réseaux sociaux </h2>
		<div class="clear share-buttons">
			<!-- Facebook -->
			<?php
			$socialsDatas = json_decode($settings->home_socials);
			foreach ($socialsDatas as $key => $value) {
				if($value->link!=null){

					echo '<div><a href="'. $value->link.'" target="_blank">';
					echo '	<span class="fa fa-'.$fa[$key].'"></span><br>';
					echo '	<span class="social_text">'. $value->text.'</span>';
					echo '</a></div>';
				}
			}
			?>

		</div>
	</section>
	<?php
	echo'<!-- END Social  -->';

}

function ms_last_articles( ) {
	echo'<!-- Derniers articles  -->';
	?>
	<section id="ms_last_articles">
		<h2 class="ms_title">Derniers articles</h2>
		<div class="clear">
			<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
				<div class="ms_apercu">
					<div <?php post_class() ?> id="post-<?php the_ID(); ?>">
						<h2><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></h2>
						<?php include (TEMPLATEPATH . '/inc/meta.php' ); ?>
						<div class="entry"><?php the_content(); ?></div>
						<div class="postmetadata">
							<?php the_tags('Tags: ', ', ', '<br />'); ?>
							Posted in <?php the_category(', ') ?> |
							<?php comments_popup_link('No Comments &#187;', '1 Comment &#187;', '% Comments &#187;'); ?>
						</div>
					</div>
				</div>

			<?php endwhile; ?>
		<?php else : ?><h2>Not Found</h2><?php endif; ?>
		</div>
	</section>

	<?php
	echo'<!-- END Derniers articles  -->';

}

function ms_last_videos( ) {
	echo'<!-- Videos  -->';
	?>
	<section id="ms_last_videos">
		<h2 class="ms_title">Dernieres vidéos</h2>
	</section>
	<?php
	echo'<!-- END Videos  -->';
}
