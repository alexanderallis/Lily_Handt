<?php

$wp_query = new WP_Query( array(
		'post_type'			=> 'slider',
		'posts_per_page'	=> -1,
		'slide-type'		=> 'facilities-slider'
	) );

if( $wp_query->have_posts() ) : ?>
	<div class="slider-wrap">
		<div class="slider-items" id="facilities-slider">
			<?php $firstSlideClass = ' active-slide'; $counter = 0; ?>
			<?php while( $wp_query->have_posts() ) : $wp_query->the_post(); ?>
				<?php
					if( has_post_thumbnail() ) {
						//the_post_thumbnail();
						$post_thumbnail_id = get_post_thumbnail_id( get_the_ID() );
          				$url =  wp_get_attachment_image_url( $post_thumbnail_id, 'full' );

          				if( empty( $url ) ) {
          					$url = sprintf( '%s/images/default-slider-image.jpg', get_template_directory_uri() );
          				}
					}
				?>
				<section data-item="<?php echo $counter++; ?>" class="slide-item  <?php echo $firstSlideClass; ?>" style="background-image: url(<?php echo $url; ?>"></section>
				<?php $firstSlideClass = ''; ?>
			<?php endwhile; ?>
		</div>
		<div class="slider-nav">
			<button class="slider-nav-left" id="facilities-slider-nav-left">
				<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 12 22.587">
					<use xlink:href="#lily-left-arrow"></use>
				</svg>
			</button>
			<button class="slider-nav-right" id="facilities-slider-nav-right">
				<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 12 22.587">
					<use xlink:href="#lily-right-arrow"></use>
				</svg>
			</button>
		</div>
	</div>

<?php endif; ?>
<?php
	wp_reset_postdata();
?>