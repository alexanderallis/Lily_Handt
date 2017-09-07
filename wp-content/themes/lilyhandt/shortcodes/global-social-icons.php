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