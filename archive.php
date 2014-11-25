<?php get_header(); ?>
<?php if (have_posts()) : ?>
	<div id="ms_post">
		<?php $post = $posts[0];

		if (is_category()) { ?>
		<h2 class="ms_title">Archive for the &#8216;<?php single_cat_title(); ?>&#8217; Category</h2>

		<?php } elseif( is_tag() ) { ?>
		<h2 class="ms_title">Posts Tagged &#8216;<?php single_tag_title(); ?>&#8217;</h2>

		<?php } elseif (is_day()) { ?>
		<h2 class="ms_title">Archive for <?php the_time('F jS, Y'); ?></h2>

		<?php } elseif (is_month()) { ?>
		<h2 class="ms_title">Archive for <?php the_time('F, Y'); ?></h2>

		<?php } elseif (is_year()) { ?>
		<h2 class="ms_title">Archive for <?php the_time('Y'); ?></h2>

		<?php } elseif (is_author()) { ?>
		<h2 class="ms_title">Author Archive</h2>

		<?php } elseif (isset($_GET['paged']) && !empty($_GET['paged'])) { ?>
		<h2 class="ms_title">Blog Archives</h2>
		<?php }
		include (TEMPLATEPATH . '/inc/nav.php' );
		?>

		<h2 class="ms_title">Derniers articles</h2>

		<div class="clear">
			<?php
			while (have_posts()) : the_post(); ?>
			<div <?php post_class() ?>>
				<div class="ms_apercu">
					<h2 id="post-<?php the_ID(); ?>"><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></h2>
					<?php include (TEMPLATEPATH . '/inc/meta.php' ); ?>
					<div class="entry"><?php the_content(); ?></div>
				</div>
			</div>
			<?php
			endwhile;
			?>
		</div>

		<?php
		include (TEMPLATEPATH . '/inc/nav.php' );
		else : ?>

		<h2 class="ms_title">Nothing found</h2>
	</div>
<?php endif;?>
</div>
<?php
get_footer();

?>
