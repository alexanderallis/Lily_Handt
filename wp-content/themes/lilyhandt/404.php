<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package Lily
 */

get_header_child(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main">

			<div id="lh-section-1">
				<div class="vc_row">
					<?php get_template_part( 'templates/template', 'nothing' ); ?>
				</div>
			</div>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();