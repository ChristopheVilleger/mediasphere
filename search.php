<?php get_header(); ?>
<div id="ms_post">
	<?php if (have_posts()) : ?>
		<header class="">
			<h2 class="ms_title">Search Results</h2>
			<div class="ms_meta"><?php include (TEMPLATEPATH . '/inc/meta.php' ); ?></div>
		</header>
		<?php while (have_posts()) : the_post(); ?>
			<div <?php post_class() ?> id="post-<?php the_ID(); ?>">
				<h2><?php the_title(); ?></h2>
				<?php include (TEMPLATEPATH . '/inc/meta.php' ); ?>
				<div class="entry">
					<?php the_excerpt(); ?>
				</div>
			</div>
		<?php endwhile; ?>
		<?php include (TEMPLATEPATH . '/inc/nav.php' ); ?>
	<?php else : ?><h2>No posts found.</h2><?php endif; ?>
	</div>
	<?php get_footer(); ?>
