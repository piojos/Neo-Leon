<?php

		$image = get_post_thumbnail_id( $post_id );
		$img_med = wp_get_attachment_image_src($image, 'small'); ?>
  		<li class="slide">
			<div class="image" style="background: url('<?php echo  $img_med[0] ?>');"></div>
			<div class="caption">
        <?php echo '<h1>' . get_the_title() . '</h1>';?>
        <ul>

        <?php echo '<h1>' . get_field('duracion') . 'Minutos</h1>';?>
        <?php echo '<h1>' . get_field('museum') . '</h1>';?>
				</ul>
			</div>
		</li>
