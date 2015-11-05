<div class="pg-c img_txt <?php the_sub_field('order'); ?>">
	<figure><?php
		$image = get_sub_field('img');
		$caption = get_post_field('post_excerpt', $image);
		if( $image ) {
			echo wp_get_attachment_image( $image, 'larger' );
			if($caption) {
				echo '<figcaption>'.$caption.'</figcaption>';
			}
		} ?>
	</figure>
	<div>
		<?php the_sub_field('txt'); ?>
	</div>
</div>
