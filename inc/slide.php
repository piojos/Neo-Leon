<?php

	$image = get_post_thumbnail_id( $post_id );
	$img_med = wp_get_attachment_image_src($image, 'small'); ?>
		<li class="slide">
			<a href="<?php the_permalink(); ?>">
			<div class="image" style="background: url('<?php echo  $img_med[0] ?>');"></div>
			<div class="caption">
				<?php echo '<h1>' . get_the_title() . '</h1>';?>
				<ul><?php 
					echo '<h3>'. get_field('museum') . '<br>';
					if(get_field('duracion')) {
						echo get_field('duracion').' Minutos';
					}
					echo '</h3>'; ?>
				</ul>
			</div>
		</a>
	</li>
