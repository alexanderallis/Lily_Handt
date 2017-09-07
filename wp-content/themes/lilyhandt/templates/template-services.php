<?php
/**
 * Template Name: Services Page
 */

function lily_styles() {
	return sprintf( '<link rel="stylesheet" type="text/css" href="%s">', get_template_directory_uri() . '/css/services.css' );
}

function lily_footer_scripts() {
	$scripts  = '';
	$scripts .= sprintf( '<script src="%s"></script>', get_template_directory_uri() . '/js/services.js' );
	return $scripts;
}

get_header_child(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main">

		<?php
		if ( have_posts() ) :

			
			/* Start the Loop */
			while ( have_posts() ) : the_post();

				/*
				 * Include the Post-Format-specific template for the content.
				 * If you want to override this in a child theme, then include a file
				 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
				 */
				the_content();

			endwhile;

		endif; ?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();
