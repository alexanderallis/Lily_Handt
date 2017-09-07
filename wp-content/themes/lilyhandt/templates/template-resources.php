<?php
/**
 * Template Name: Resources Page
 */

function lily_styles() {
	return sprintf( '<link rel="stylesheet" type="text/css" href="%s">', get_template_directory_uri() . '/css/resources.css' );
}

// function lily_footer_scripts() {
// 	$scripts  = '';
// 	$scripts .= sprintf( '<script src="%s"></script>', get_template_directory_uri() . '/js/services.js' );
// 	return $scripts;
// }

get_header_child(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main">

			<div id="lh-section-1">
				<div class="vc_row">
				<?php
					$args = array(
							'post_type'			=> 'post',
							'posts_per_page'	=> -1,
							'post_status'		=> 'publish',
							'orderby'			=> 'date',
							'order'				=> 'DESC'
						);
					$query = new WP_Query( $args );
					
					if( $query->have_posts() ) :
						while( $query->have_posts() ) : $query->the_post();
							?>
							<article class="lily-resource-item">
								<div class="fxg-pad fxg-wrap blog-module">
									<div class="fxg-1-4">
										<div class="blog-module-left">
											<h2 class="blog-module-title">
												<?php the_title(); ?>
											</h2>
											<span class="blog-module-time">
												<?php the_date( 'n.j.y' ); ?>
											</span>
										</div>
									</div>
									<div class="fxg-1-8">
										<div class="blog-module-right">
											<?php the_content(); ?>
										</div>
									</div>
								</div>
							</article>
							<?php
						endwhile;
					else :
						get_template_part( 'templates/template', 'nothing' );
					endif;
					wp_reset_postdata();
				?>
				</div>
			</div>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();
