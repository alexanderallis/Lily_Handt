<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Lily
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="http://gmpg.org/xfn/11">

	<?php wp_head(); ?>

	<script src="https://cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.3/html5shiv-printshiv.min.js"></script>

	<!-- Common Stylesheets -->
	<link rel="stylesheet" type="text/css" href="//cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/css/style.css">

	<!-- Page specific styles -->
	<link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/css/home.css">

	<!-- Vendor JS -->
	<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<script src="//cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.7.1/slick.js"></script>

	<?php
		if( function_exists( 'lily_header_scripts' ) ) :
			echo lily_header_scripts();
		endif;
	?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'lilyhandt' ); ?></a>

	<header id="masthead" class="site-header">
		<div class="top-header">
			<div class="site-branding">
				<h1 class="site-logo">
					<a href="<?php echo home_url(); ?>">
						<?php if( $logoURL = of_get_option( 'lily_logo_primary' ) ) : ?>
							<img src="<?php echo $logoURL; ?>">
						<?php else : ?>
							<img src="<?php echo get_template_directory_uri(); ?>/images/brand.svg">
						<?php endif; ?>
					</a>
				</h1>
			</div><!-- .site-branding -->

			<nav id="site-navigation" class="main-navigation">
				<button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false">
					<span></span>
					<span></span>
					<span></span>
				</button>
				<?php
					wp_nav_menu( array(
						'theme_location' => 'menu-1',
						'menu_id'        => 'primary-menu',
					) );
				?>
			</nav><!-- #site-navigation -->
		</div>
		<a href="<?php echo home_url(); ?>" class="bottom-logo">
			<?php if( $logoURL = of_get_option( 'lily_logo_secondary' ) ) : ?>
				<img src="<?php echo $logoURL; ?>">
			<?php else : ?>
				<img src="<?php echo get_template_directory_uri(); ?>/images/logo.svg">
			<?php endif; ?>
		</a>
	</header><!-- #masthead -->

	<div id="content" class="site-content">
