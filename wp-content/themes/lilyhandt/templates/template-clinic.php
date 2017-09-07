<?php
/**
 * Template Name: Clinic Page
 */

function lily_styles() {
	$styles  = '';
	$styles .= sprintf( '<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/lightbox2/2.9.0/css/lightbox.min.css">' );
	$styles .= sprintf( '<link rel="stylesheet" type="text/css" href="%s">', get_template_directory_uri() . '/css/clinic.css' );
	return $styles;
}

function lily_footer_scripts() {
	$scripts  = '';
	$scripts .= sprintf( '<script src="%s"></script>', get_template_directory_uri() . '/js/clinic.js' );
	$scripts .= sprintf( '<script src="//cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.7.1/slick.min.js"></script>' );
	$scripts .= sprintf( '<script src="//cdnjs.cloudflare.com/ajax/libs/lightbox2/2.9.0/js/lightbox.min.js"></script>' );
	$scripts .= '' .
	'<script>
		lightbox.option({
			"disableScrolling": true,
			"alwaysShowNavOnTouchDevices": false,
			"showImageNumberLabel": false
		});
	</script>';
	return $scripts;
}

get_header_child(); ?>

<svg class="lily-screen-reader">
    <path id="lily-left-arrow" stroke-miterlimit="10" fill="none" d="M11.646 22.233l-10.939-10.938 10.939-10.941" />
    <path id="lily-right-arrow" stroke-miterlimit="10" fill="none" d="M.354.354l10.939 10.94-10.939 10.939" />
</svg>

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
