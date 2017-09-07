<?php

$wp_query = new WP_Query( array(
		'post_type'			=> 'slider',
		'posts_per_page'	=> -1,
		'slide-type'		=> 'before-after-slider'
	) );

if( $wp_query->have_posts() ) : ?>
	<div class="lh-before-after-wrap">
		<div class="lh-before-after" id="lh-before-after">
			<?php $lightBoxIndividualImage = 0; ?>
			<?php while( $wp_query->have_posts() ) : $wp_query->the_post(); ?>
				<div class="lh-before-after-item">
					<div class="lh-before-after-img-box">
						<?php
							if( has_post_thumbnail() ) {
								$postThumbID = get_post_thumbnail_id( get_the_ID() );
								$url         = wp_get_attachment_image_url( $postThumbID, 'full' );
							} else {
								$url = sprintf( '%s/default-before-after.png', get_template_directory_uri() );
							}
						?>
						<a href="<?php echo $url; ?>" class="before-after-lightbox" data-title="<?php the_title(); ?>" data-lightbox="<?php echo $lightBoxIndividualImage++; ?>">
							<img src="<?php echo $url; ?>">
						</a>
						<h5 class="lh-before-after-img-title"><?php the_title(); ?></h5>
					</div>
				</div>
			<?php endwhile; ?>
		</div>
		<div class="lh-before-after-nav">
			<a href="#" id="lh-before-after-previous">
				<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 12 22.587">
					<use xlink:href="#lily-left-arrow"></use>
				</svg>
			</a>
			<a href="#" id="lh-before-after-next">
				<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 12 22.587">
					<use xlink:href="#lily-right-arrow"></use>
				</svg>
			</a>
		</div>
	</div>

<?php endif; ?>
<?php
	wp_reset_postdata();
?>