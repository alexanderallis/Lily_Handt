<?php
/**
 * Template Name: Booking Confirmed Page
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

						<!-- Booking Confirmed -->
						<?php
							/**
							 * SAMPLE URL
							 * Redirected from: http://localhost:3000/lilyhandt/booking-confirmed/?location={location_name}&service={service_name}&provider={staff_name}&time={datetime}
							 */

							// LOCATION
							$location = isset($_GET['location']) && !empty($_GET['location']) ? strip_tags($_GET['location']) : null;

							// PROVIDER
							$provider = isset($_GET['provider']) && !empty($_GET['provider']) ? strip_tags($_GET['provider']) : null;
							
							// DATE TIME
							$dateTime = isset($_GET['time']) && !empty($_GET['time']) ? strip_tags($_GET['time']) : null;

							// SERVICE
							$service  = isset($_GET['service']) && !empty($_GET['service']) ? strip_tags($_GET['service']) : null;
							
							$isShowConfirm = false;
							if( $dateTime && $location && $provider && $dateTime && $service ) {
								$isShowConfirm  = true;
								$dateTimeObject = date_create_from_format( 'F d, Y h:i a', $dateTime );
								$dateTimestamp  = $dateTimeObject->getTimestamp();
								$date           = date( 'F d', $dateTimestamp );
								$time           = date( 'g:i', $dateTimestamp );
							}
						?>

						<?php if( $isShowConfirm ) : ?>
							<div id="birs_booking_box">
								<div id="birs_appointment_form" class="birs_appointment_form_success">
									<div id="birs_booking_success">

										<h2 class="birs_section">your appointment has been booked successfully</h2>
										<div class="birs_booking_success_inner">
										
											<div class="fxg-pad fxg-parent fxg-wrap nopadding">
												<div class="fxg-1-6">
													<div class="fxg-pad fxg-nowrap nopadding">
														<div class="fxg-1-5">
															<div class="white-box">
																<span>location</span>
															</div>
														</div>
														<div class="fxg-1-7">
															<div class="plain-box">
																<span><?php echo $location; ?></span>
															</div>
														</div>
													</div>
												</div>
												<div class="fxg-1-6">
													<div class="fxg-pad fxg-nowrap nopadding">
														<div class="fxg-1-5">
															<div class="white-box">
																<span>date</span>
															</div>
														</div>
														<div class="fxg-1-7">
															<div class="space-right">
																<div class="plain-box">
																	<span><?php echo $date; ?></span>
																</div>
															</div>
														</div>
													</div>
												</div>
											</div>

											<div class="fxg-pad fxg-parent fxg-wrap nopadding">
												<div class="fxg-1-6">
													<div class="fxg-pad fxg-nowrap nopadding">
														<div class="fxg-1-5">
															<div class="white-box">
																<span>provider</span>
															</div>
														</div>
														<div class="fxg-1-7">
															<div class="plain-box">
																<span><?php echo $provider; ?></span>
															</div>
														</div>
													</div>
												</div>
												<div class="fxg-1-6">
													<div class="fxg-pad fxg-nowrap nopadding">
														<div class="fxg-1-5">
															<div class="white-box">
																<span>time</span>
															</div>
														</div>
														<div class="fxg-1-7">
															<div class="plain-box">
																<span><?php echo $time; ?></span>
															</div>
														</div>
													</div>
												</div>
											</div>

											<div class="fxg-pad fxg-parent fxg-wrap nopadding">
												<div class="fxg-1-6">
													<div class="fxg-pad fxg-nowrap nopadding">
														<div class="fxg-1-5">
															<div class="white-box">
																<span>service</span>
															</div>
														</div>
														<div class="fxg-1-7">
															<div class="plain-box">
																<span><?php echo $service; ?></span>
															</div>
														</div>
													</div>
												</div>
											</div>

										</div>
									</div>
								</div>
								<p class="birs_section_end">an e-mail confirmation has been sent to the address you provided</p>
							</div>
						<?php else : ?>
							<?php get_template_part( 'templates/template', 'nothing' ); ?>
						<?php endif; ?>
						<!-- End - Booking Confirmed -->
						
					</div>
				</div>
			</div>
		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();
