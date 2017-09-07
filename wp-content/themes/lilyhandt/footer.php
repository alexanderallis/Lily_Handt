<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Lily
 */

?>

	</div><!-- #content -->
	<?php if ( true ) { ?>
	<footer id="colophon" class="site-footer">
		<div class="site-info vc_row">
			<div class="fxg-pad nopadding footer-gridpad">
				<div class="fxg-1-6 footer-grid">
					<?php
						$twitterURL   = of_get_option( 'lily_twitter' );
						$facebookURL  = of_get_option( 'lily_facebook' );
						$instagramURL = of_get_option( 'lily_instagram' );
						if( !empty( $facebookURL ) || !empty( $twitterURL ) || !empty( $instagramURL ) ) {
							?>
							<ul class="footer-social">
								<?php
									if( !empty($twitterURL) ) :
										printf( '<li><a href="%s"><i class="fa fa-twitter"></i></a></li>', $twitterURL );
									endif;
									if( !empty($facebookURL) ) :
										printf( '<li><a href="%s"><i class="fa fa-facebook"></i></a></li>', $facebookURL );
									endif;
									if( !empty($instagramURL) ) :
										printf( '<li><a href="%s"><i class="fa fa-instagram"></i></a></li>', $instagramURL );
									endif;
								?>
							</ul>
							<?php
						}
					?>
				</div>
				<div class="fxg-1-6 footer-grid">
					<p class="footer-logo">
						<a href="<?php echo home_url(); ?>">
							<?php if( $logoURL = of_get_option( 'lily_logo_secondary' ) ) : ?>
								<img src="<?php echo $logoURL; ?>">
							<?php else : ?>
								<img src="<?php echo get_template_directory_uri(); ?>/images/logo.svg">
							<?php endif; ?>
						</a>
						<span>&copy; <?php echo date('Y'); ?></span>
					</p>
				</div>
			</div>
		</div><!-- .site-info -->
	</footer><!-- #colophon -->
	<?php } ?>
</div><!-- #page -->

<?php wp_footer(); ?>

<?php
	if( function_exists( 'lily_footer_scripts' ) ) :
		echo lily_footer_scripts();
	endif;
?>
<script src="<?php echo get_template_directory_uri(); ?>/js/app.js"></script>
</body>
</html>
