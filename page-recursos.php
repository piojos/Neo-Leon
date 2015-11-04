<?php

	// $bodyClass = "home";
	// $newsletter = 1;

get_header();


$args = array(
	'post_type' => get_post_type(),
	'post_parent' => $post->ID
);
$loop = new WP_Query( $args ); ?>


<article><?php

	if ($loop->have_posts()) {
		echo get_template_part('inc/heading'); ?>

			<div class="tres_museos" style="background-image: url('<?php echo $bg3mImg[0]; ?>');">
				<div class="mask"></div>
				<wrap>
					<dl><?php

					while ($loop->have_posts()) :
						$loop->the_post();
						$image = get_post_thumbnail_id( $post_id );
						$img_med = wp_get_attachment_image_src($image, 'cardSize'); ?>
						<div>
							<a href="<?php the_permalink(); ?>" title="Mas del <?php the_title(); ?>">
								<div class="feature-img">
									<img src="<?php echo $img_med[0]; ?>" atl="3 museos">
								</div>
								<dt><?php the_title(); ?></dt>
							</a>
							<dd><?php the_field('kicker'); ?></dd>
						</div><?php
					endwhile; ?>

					</dl>
				</wrap>
			</div><?php

		wp_reset_query();
	} ?>

</article><?php


get_footer(); ?>
