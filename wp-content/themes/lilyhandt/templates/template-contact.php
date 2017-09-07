<?php
/**
 * Template Name: Contact Page
 */

function lily_styles() {
	return sprintf( '<link rel="stylesheet" type="text/css" href="%s">', get_template_directory_uri() . '/css/contact.css' );
}

function lily_header_scripts() {
	$scripts = '<script src="//maps.googleapis.com/maps/api/js?key=AIzaSyDBEnF83v5d2DU_yyRaFQd2XflLwHv_QwQ" async></script>';
	return $scripts;
}

function lily_footer_scripts() {
	$scripts = sprintf( '<script src="%s"></script>', get_template_directory_uri() . '/js/contact.js' );
	return $scripts;
}

get_header_child(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main">

		<span id="map-marker-url" data-map-marker="<?php echo get_template_directory_uri(); ?>/images/map-marker.svg"></span>

		<?php if( false ) : ?>
		<!-- In Native Syntaxt of Contact Form 7 -->
		<!-- <div class="fxg-pad fxg-wrap lily-contact-form"><div class="fxg-1-4"><div class="lily-form-group"><label>[text* lily-name class:lily-input-field placeholder "name"]</label></div><div class="lily-form-group"><label>[email* lily-email class:lily-input-field placeholder "email"]</label></div><div class="lily-form-group"><label>[tel* lily-phone class:lily-input-field placeholder "phone"]</label></div><div class="lily-form-group"><label>[text* lily-location class:lily-input-field placeholder "location"]</label></div><div class="lily-form-group"><ul class="lily-drop-down" id="lily-drop-down-subject" data-target="#lily-subject"><li><span>subject</span><ul><li>scheduling</li><li>cost</li><li>procedure</li><li>other</li></ul></li></ul>[text* lily-subject id:lily-subject class:lily-screen-reader]</div></div><div class="fxg-1-8"><div class="lily-form-group flex-full-height">[textarea* lily-message class:lily-input-field placeholder 10x1 "message"]</div></div><div class="fxg-1-12"><div class="fxg-pad nopadding"><div class="fxg-1-11"><div class="lily-form-group lily-form-submit lily-contact-form-message" id="lily-contact-form-message">[response]</div></div><div class="fxg-1-1"><div class="lily-form-group lily-form-submit"><button type="submit" class="lily-spinner lily-button lily-button-black">send</button></div></div></div></div></div> -->

		<!-- Compressed HTML Markup -->
		<!-- <div class="fxg-pad fxg-wrap lily-contact-form"><div class="fxg-1-4"><div class="lily-form-group"><label><input class="lily-input-field" type="text" name="lily-name" placeholder="name"></label></div><div class="lily-form-group"><label><input class="lily-input-field" type="email" name="lily-email" placeholder="email"></label></div><div class="lily-form-group"><label><input class="lily-input-field" type="text" name="lily-phone" placeholder="phone"></label></div><div class="lily-form-group"><label><input class="lily-input-field" type="text" name="lily-location" placeholder="location"></label></div><div class="lily-form-group"><ul class="lily-drop-down" id="lily-drop-down-subject" data-target="#lily-subject"><li><span>subject</span><ul><li>scheduling</li><li>cost</li><li>procedure</li><li>other</li></ul></li></ul><input type="hidden" name="lily-subject" id="lily-subject"></div></div><div class="fxg-1-8"><div class="lily-form-group flex-full-height"><textarea name="lily-message" placeholder="message" id="lily-message" class="lily-input-field"></textarea></div></div><div class="fxg-1-12"><div class="fxg-pad nopadding"><div class="fxg-1-11"><div class="lily-form-group lily-form-submit lily-contact-form-message" id="lily-contact-form-message">[response]</div></div><div class="fxg-1-1"><div class="lily-form-group lily-form-submit"><button type="submit" class="lily-spinner lily-button lily-button-black">send</button></div></div></div></div></div> -->

		<!-- Original HTML Markup -->
		<!-- <div id="lh-section-1">
			<div class="vc_row">
				<div class="fxg-pad fxg-wrap lily-contact-form">
					<div class="fxg-1-4">
						<div class="lily-form-group">
							<label>
								<input class="lily-input-field" type="text" name="lily-name" placeholder="name">
							</label>
						</div>
						<div class="lily-form-group">
							<label>
								<input class="lily-input-field" type="email" name="lily-email" placeholder="email">
							</label>
						</div>
						<div class="lily-form-group">
							<label>
								<input class="lily-input-field" type="text" name="lily-phone" placeholder="phone">
							</label>
						</div>
						<div class="lily-form-group">
							<label>
								<input class="lily-input-field" type="text" name="lily-location" placeholder="location">
							</label>
						</div>
						<div class="lily-form-group">
							<ul class="lily-drop-down" id="lily-drop-down-subject" data-target="#lily-subject">
								<li>
									<span>subject</span>
									<ul>
										<li>subject Item 1</li>
										<li>subject Item 2</li>
										<li>subject Item 3</li>
									</ul>
								</li>
							</ul>
							<input type="hidden" name="lily-subject" id="lily-subject">
						</div>
					</div>
					<div class="fxg-1-8">
						<div class="lily-form-group flex-full-height">
							<textarea name="lily-message" placeholder="message" id="lily-message" class="lily-input-field"></textarea>
						</div>
					</div>
					<div class="fxg-1-12">
						<div class="fxg-pad nopadding">
							<div class="fxg-1-11">
								<div class="lily-form-group lily-form-submit lily-contact-form-message" id="lily-contact-form-message">
									[response]
								</div>
							</div>
							<div class="fxg-1-1">
								<div class="lily-form-group lily-form-submit">
									<button type="submit" class="lily-spinner lily-button lily-button-black">send</button>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div> -->
		<?php endif; ?>
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
