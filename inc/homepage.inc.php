<?php
/**
 * Homepage functions.
 *
 * @package MediaSphere
 */

function ms_homepage() {

	echo ms_top_menu();

	echo ms_featured();

	echo ms_categories();

	echo ms_search();

	echo ms_social_network();

	echo ms_last_articles();

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
		<h2 class="ms_title">A la une</h2>
		<div class="clear">
			<div class="ms_featured_section ">
				<figure>
					<img src="http://www.mairie-villetaneuse.fr/images/villetaneuse/actus/2014_10/cap_quartiers.jpg" alt="">
					<figcaption>Proposition pour le thème</figcaption>
				</figure>
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
			<a href="" title="" class="redBG">Catégorie 1</a>
			<a href="" title="" class="redBG">Catégorie 2</a>
			<a href="" title="" class="redBG">Catégorie 3</a>
			<a href="" title="" class="redBG">Catégorie 4</a>
			<a href="" title="" class="redBG">Catégorie 5</a>
			<a href="" title="" class="redBG">Catégorie 6</a>
		</div>
	</section>

	<?php
	echo'<!-- END Categories  -->';
}


function ms_search( ) {
	echo'<!-- Search  -->';
	?>
	<section id="ms_social_network">
		<h2 class="ms_title">Réseaux sociaux</h2>
		<div class="clear">
		</div>
	</section>
	<?php
	echo'<!-- END Search  -->';

}

function ms_social_network( ) {
	echo'<!-- Social  -->';

	echo'<!-- END Social  -->';

}

function ms_last_articles( ) {
	echo'<!-- Derniers articles  -->';
	?>
	<section id="ms_last_articles">
		<h2 class="ms_title">Derniers articles</h2>
		<div class="clear">

			<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

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

