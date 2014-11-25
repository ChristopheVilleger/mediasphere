<?php


function ms_cinematheque() {
	//affichage de toute la playlist
	//
	?>
	<section id="ms_featured">
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
<?php
}

?>
