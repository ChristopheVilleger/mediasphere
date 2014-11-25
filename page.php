<?php get_header(); ?>
<div class="ms_page">
	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
		<header class="">
			<h2 class="ms_title"><?php the_title(); ?></h2>
			<div class="ms_meta"><?php include (TEMPLATEPATH . '/inc/meta.php' ); ?></div>
		</header>
		<div class="post" id="post-<?php the_ID(); ?>">
			<div class="entry">
				<?php the_content(); ?>
				<?php wp_link_pages(array('before' => 'Pages: ', 'next_or_number' => 'number')); ?>
			</div>
			<?php edit_post_link('Edit this entry.', '<p>', '</p>'); ?>
		</div>
		<?php comments_template(); ?>
	<?php endwhile; endif; ?>
</div>
<?php get_footer(); ?>
