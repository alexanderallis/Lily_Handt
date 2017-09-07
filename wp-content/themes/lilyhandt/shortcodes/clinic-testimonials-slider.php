<?php

$wp_query = new WP_Query( array(
		'post_type'			=> 'testimonials',
		'posts_per_page'	=> -1
	) );

if( $wp_query->have_posts() ) : ?>
	<div class="lh-testimonials-wrap">
		<div class="lh-testimonials" id="lh-testimonials">
			<?php while( $wp_query->have_posts() ) : $wp_query->the_post(); ?>
				<div class="lh-testimonial-item">
					<div class="lh-testimonial-box">
						<?php the_content(); ?>
						<h6>
							<?php the_title(); ?><span><?php echo get_field( 'testimonial_location' ) ? ', ' . get_field( 'testimonial_location' ) : ''; ?></span>
						</h6>
					</div>
				</div>
			<?php endwhile; ?>
		</div>
		<div class="lh-testimonials-nav">
			<a href="#" id="lh-testimonials-previous">
				<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 12 22.587">
					<use xlink:href="#lily-left-arrow"></use>
				</svg>
			</a>
			<a href="#" id="lh-testimonials-next">
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