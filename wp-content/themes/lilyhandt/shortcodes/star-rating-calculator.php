<?php

if( isset($vipExperienceRating) ) {
	if( is_numeric($vipExperienceRating) && $vipExperienceRating > 0 ) {
		?>

			<?php
				$starRatingWidth = 0;
				$starRatingWidth = $vipExperienceRating * 40;
			?>
			<div class="lily-star-rating" style="max-width: <?php echo $starRatingWidth; ?>px"></div>

		<?php
	}
}

?>