<?php
/**
 * Template Name: Appointment Page
 */

function lily_styles() {
	return sprintf( '<link rel="stylesheet" type="text/css" href="%s">', get_template_directory_uri() . '/css/appointment.css' );
}

function lily_footer_scripts() {
	$scripts  = '';
	$scripts .= sprintf( '<script src="%s"></script>', get_template_directory_uri() . '/js/appointment.js' );
	return $scripts;
}

get_header_child(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main">
			<div id="lh-section-1">
				<div class="vc_row">
					<div class="appointment-booking-form">
						<?php
							$locationIDs = get_posts(array(
								'post_type'		  => 'birs_location',
								'fields'          => 'ids', // Only get post IDs
								'posts_per_page'  => -1,
								'orderby'		  => 'ID',
								'order'			  => 'ASC'
							));
							$providersIDs = get_posts(array(
								'post_type'		  => 'birs_staff',
								'fields'          => 'ids', // Only get post IDs
								'posts_per_page'  => -1,
								'orderby'		  => 'ID',
								'order'			  => 'ASC'
							));
							$serviceIDs = get_posts(array(
								'post_type'		  => 'birs_service',
								'fields'          => 'ids', // Only get post IDs
								'posts_per_page'  => -1,
								'orderby'		  => 'ID',
								'order'			  => 'ASC'
							));
							$locationIDs  = implode(',', $locationIDs);
							$providersIDs = implode(',', $providersIDs);
							$serviceIDs   = implode(',', $serviceIDs);

							$shortcode = sprintf( '[bpscheduler_booking_form location_ids="%s" staff_ids="%s" service_ids="%s"]', $locationIDs, $providersIDs, $serviceIDs );
							echo do_shortcode( $shortcode );
						?>
					</div>
				</div>
			</div>
		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();