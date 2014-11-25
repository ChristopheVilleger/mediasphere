<?php get_header(); ?>
<div id="ms_post">
	<?php
	cinematheque();

	?>
	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
		<h2 class="ms_title"><?php the_title(); ?></h2>
		<div class="ms_meta"><?php include (TEMPLATEPATH . '/inc/meta.php' ); ?></div>
		<section class="ms_article">
			<div <?php post_class() ?> id="post-<?php the_ID(); ?>">
				<div class="entry">
					<?php the_content(); ?>
					<?php wp_link_pages(array('before' => 'Pages: ', 'next_or_number' => 'number')); ?>
					<?php the_tags( 'Tags: ', ', ', ''); ?>
				</div>
				<?php edit_post_link('Edit this entry','','.'); ?>
			</div>

			<?php comments_template(); ?>
		</section>
	<?php endwhile; endif; ?>
</div>
<?php get_sidebar(); ?>

<?php get_footer(); ?>