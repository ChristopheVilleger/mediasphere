<!DOCTYPE html>
<head>
	<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />
	<title><?php wp_title( '|', true, 'right' ); ?></title>
	<link rel="shortcut icon" href="/favicon.ico" type="image/x-icon" />
	<link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" type="text/css" />
	<?php if ( is_singular() ) wp_enqueue_script( 'comment-reply' ); ?>
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
	<div id="page-wrap">
		<header id="ms_header">
			<!-- Logo -->
			<div id="ms_logo">
				<div id="ms_logo_txt">
					<a href="<?php echo get_option('home'); ?>/"><?php bloginfo('name'); ?></a>
				</div>
				<div class="description"><?php bloginfo('description'); ?></div>
			</div>
			<!-- END logo -->
			<nav id="ms_header_menu">
				<?php if ( has_nav_menu( 'ms_top_menu' ) ) : ?>
					<?php wp_nav_menu( array( 'container_class' => 'header-links', 'container_id' => 'nav-header-links', 'theme_location' => 'ms_top_menu' ) ); ?>
				<?php endif; ?>
			</nav>
			<div class="clear"></div>
		</header>

		<?php
		if(is_home() )
			ms_homepage();
		?>
